<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['id']) || ($_SESSION['tipo'] ?? '') !== 'cliente') {
    header("Location: Login.php?retorno=Meus_Pedidos.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "tcc");
if (!$conn) {
    die("Não foi possível conectar ao banco de dados.");
}
mysqli_set_charset($conn, "utf8mb4");

$idCliente = (int) $_SESSION['id'];
if (empty($_SESSION['csrf_meus_pedidos'])) {
    $_SESSION['csrf_meus_pedidos'] = bin2hex(random_bytes(32));
}
$mensagemPedido = '';
$erroPedido = '';

// Exclui somente pedidos pertencentes ao cliente autenticado.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['acao'] ?? '') === 'excluir_pedido') {
    $token = (string) ($_POST['csrf_token'] ?? '');
    $codigoPedido = filter_input(INPUT_POST, 'codigo_pedido', FILTER_VALIDATE_INT);
    if (!$codigoPedido || !hash_equals($_SESSION['csrf_meus_pedidos'], $token)) {
        $erroPedido = 'Não foi possível validar a solicitação. Atualize a página e tente novamente.';
    } else {
        mysqli_begin_transaction($conn);
        try {
            $stmtPedido = mysqli_prepare($conn, "SELECT Codigo FROM tbVenda WHERE Codigo = ? AND tbCliente_Codigo = ? FOR UPDATE");
            mysqli_stmt_bind_param($stmtPedido, 'ii', $codigoPedido, $idCliente);
            mysqli_stmt_execute($stmtPedido);
            $pedidoEncontrado = mysqli_stmt_get_result($stmtPedido);
            if (!mysqli_fetch_assoc($pedidoEncontrado)) {
                throw new Exception('Pedido não encontrado ou não pertence à sua conta.');
            }
            mysqli_stmt_close($stmtPedido);

            // Devolve ao estoque as quantidades que foram baixadas na finalização da compra.
            $stmtItens = mysqli_prepare($conn, "SELECT tbProduto_Codigo, Qtd_Produto FROM tbVenda_Produto WHERE tbVenda_Codigo = ? FOR UPDATE");
            mysqli_stmt_bind_param($stmtItens, 'i', $codigoPedido);
            mysqli_stmt_execute($stmtItens);
            $resultadoItens = mysqli_stmt_get_result($stmtItens);
            $itensPedido = [];
            while ($itemPedido = mysqli_fetch_assoc($resultadoItens)) { $itensPedido[] = $itemPedido; }
            mysqli_stmt_close($stmtItens);

            $stmtEstoque = mysqli_prepare($conn, "UPDATE tbProduto SET Qntd_Estoque = Qntd_Estoque + ? WHERE Codigo = ?");
            foreach ($itensPedido as $itemPedido) {
                $quantidadeDevolver = (int) $itemPedido['Qtd_Produto'];
                $codigoProduto = (int) $itemPedido['tbProduto_Codigo'];
                mysqli_stmt_bind_param($stmtEstoque, 'ii', $quantidadeDevolver, $codigoProduto);
                if (!mysqli_stmt_execute($stmtEstoque)) {
                    throw new Exception('Não foi possível atualizar o estoque dos produtos.');
                }
            }
            mysqli_stmt_close($stmtEstoque);

            $stmtExcluirItens = mysqli_prepare($conn, "DELETE FROM tbVenda_Produto WHERE tbVenda_Codigo = ?");
            mysqli_stmt_bind_param($stmtExcluirItens, 'i', $codigoPedido);
            if (!mysqli_stmt_execute($stmtExcluirItens)) { throw new Exception('Não foi possível excluir os itens do pedido.'); }
            mysqli_stmt_close($stmtExcluirItens);

            $stmtExcluirPedido = mysqli_prepare($conn, "DELETE FROM tbVenda WHERE Codigo = ? AND tbCliente_Codigo = ?");
            mysqli_stmt_bind_param($stmtExcluirPedido, 'ii', $codigoPedido, $idCliente);
            if (!mysqli_stmt_execute($stmtExcluirPedido) || mysqli_stmt_affected_rows($stmtExcluirPedido) !== 1) {
                throw new Exception('Não foi possível excluir o pedido.');
            }
            mysqli_stmt_close($stmtExcluirPedido);
            mysqli_commit($conn);
            header('Location: Meus_Pedidos.php?excluido=1');
            exit;
        } catch (Throwable $e) {
            mysqli_rollback($conn);
            $erroPedido = $e->getMessage();
        }
    }
}
if (isset($_GET['excluido']) && $_GET['excluido'] === '1') {
    $mensagemPedido = 'Pedido excluído com sucesso.';
}

$sql = "SELECT v.Codigo, v.Data, v.Valor_Total, v.Status, v.FormaRecebimento,
               p.Modelo, vp.Qtd_Produto, vp.Valor_Unitario, vp.Valor_Total AS Subtotal
        FROM tbVenda v
        LEFT JOIN tbVenda_Produto vp ON vp.tbVenda_Codigo = v.Codigo
        LEFT JOIN tbProduto p ON p.Codigo = vp.tbProduto_Codigo
        WHERE v.tbCliente_Codigo = ?
        ORDER BY v.Data DESC, v.Codigo DESC, p.Modelo ASC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $idCliente);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

$pedidos = [];
while ($linha = mysqli_fetch_assoc($resultado)) {
    $codigo = (int) $linha['Codigo'];
    if (!isset($pedidos[$codigo])) {
        $pedidos[$codigo] = [
            'Codigo' => $codigo,
            'Data' => $linha['Data'],
            'Valor_Total' => $linha['Valor_Total'],
            'Status' => $linha['Status'],
            'FormaRecebimento' => $linha['FormaRecebimento'],
            'Itens' => []
        ];
    }
    if ($linha['Modelo'] !== null) {
        $pedidos[$codigo]['Itens'][] = [
            'Modelo' => $linha['Modelo'],
            'Quantidade' => $linha['Qtd_Produto'],
            'Valor_Unitario' => $linha['Valor_Unitario'],
            'Subtotal' => $linha['Subtotal']
        ];
    }
}
mysqli_stmt_close($stmt);

function hPedido($valor) {
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}
function moedaPedido($valor) {
    return 'R$ ' . number_format((float) $valor, 2, ',', '.');
}
function statusPedido($status) {
    $status = strtolower(trim((string) $status));
    if ($status === 'pago') return 'bg-success';
    if ($status === 'pendente') return 'bg-warning text-dark';
    if ($status === 'cancelado') return 'bg-danger';
    return 'bg-secondary';
}

$totalPedidos = count($pedidos);
$totalGasto = 0;
foreach ($pedidos as $pedido) {
    if (strtolower((string) $pedido['Status']) !== 'cancelado') {
        $totalGasto += (float) $pedido['Valor_Total'];
    }
}

include("../../includes/header.php");
?>

<main class="container mt-4 mb-5">
    <?php if ($mensagemPedido !== '') { ?><div class="alert alert-success alert-dismissible fade show" role="alert"><i class="bi bi-check-circle-fill me-2"></i><?= hPedido($mensagemPedido) ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button></div><?php } ?>
    <?php if ($erroPedido !== '') { ?><div class="alert alert-danger" role="alert"><?= hPedido($erroPedido) ?></div><?php } ?>
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h2 class="mb-1"><i class="bi bi-bag-check"></i> Meus Pedidos</h2>
            <p class="text-muted mb-0">Acompanhe suas compras realizadas na LabMaker.</p>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-sm-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Pedidos realizados</div>
                    <div class="fs-3 fw-bold"><?= $totalPedidos ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Total em pedidos não cancelados</div>
                    <div class="fs-3 fw-bold"><?= moedaPedido($totalGasto) ?></div>
                </div>
            </div>
        </div>
    </div>

    <?php if (empty($pedidos)) { ?>
        <div class="card shadow-sm">
            <div class="card-body text-center py-5">
                <i class="bi bi-bag-x display-4 text-secondary"></i>
                <h5 class="mt-3">Você ainda não realizou nenhum pedido.</h5>
                <p class="text-muted mb-4">Quando concluir uma compra, ela aparecerá aqui.</p>
                <a href="index.php" class="btn btn-primary">Explorar produtos</a>
            </div>
        </div>
    <?php } else { ?>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Histórico de pedidos</h5>
            <a href="Minha_Conta_Cliente.php" class="text-decoration-none"><i class="bi bi-person"></i> Minha conta</a>
        </div>

        <div class="d-flex flex-column gap-3">
            <?php foreach ($pedidos as $pedido) { ?>
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <div class="row align-items-center g-2">
                            <div class="col-6 col-md-3">
                                <small class="text-muted d-block">Pedido</small>
                                <strong>#<?= $pedido['Codigo'] ?></strong>
                            </div>
                            <div class="col-6 col-md-3">
                                <small class="text-muted d-block">Data</small>
                                <strong><?= $pedido['Data'] ? date('d/m/Y', strtotime($pedido['Data'])) : '-' ?></strong>
                            </div>
                            <div class="col-6 col-md-3">
                                <small class="text-muted d-block">Status</small>
                                <span class="badge <?= statusPedido($pedido['Status']) ?>"><?= hPedido($pedido['Status']) ?></span>
                            </div>
                            <div class="col-6 col-md-3 text-md-end">
                                <small class="text-muted d-block">Total do pedido</small>
                                <strong class="fs-5"><?= moedaPedido($pedido['Valor_Total']) ?></strong>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold mb-3"><i class="bi bi-box-seam me-1"></i> Produtos</h6>
                        <?php if (empty($pedido['Itens'])) { ?>
                            <p class="text-muted mb-0">Os itens deste pedido não estão disponíveis.</p>
                        <?php } else { ?>
                            <div class="table-responsive">
                                <table class="table table-sm align-middle mb-3">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Produto</th>
                                            <th class="text-center">Quantidade</th>
                                            <th class="text-end">Valor unitário</th>
                                            <th class="text-end">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pedido['Itens'] as $item) { ?>
                                            <tr>
                                                <td><?= hPedido($item['Modelo']) ?></td>
                                                <td class="text-center"><?= (int) $item['Quantidade'] ?></td>
                                                <td class="text-end"><?= moedaPedido($item['Valor_Unitario']) ?></td>
                                                <td class="text-end"><?= moedaPedido($item['Subtotal']) ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mt-3">
                            <div class="text-muted small">
                                <i class="bi bi-bag-check me-1"></i>
                                Forma de recebimento: <strong><?= hPedido($pedido['FormaRecebimento']) ?></strong>
                            </div>
                            <form method="POST" class="m-0" onsubmit="return confirm('Tem certeza de que deseja excluir definitivamente o pedido #<?= (int) $pedido['Codigo'] ?>? Os produtos voltarão ao estoque.');">
                                <input type="hidden" name="acao" value="excluir_pedido">
                                <input type="hidden" name="codigo_pedido" value="<?= (int) $pedido['Codigo'] ?>">
                                <input type="hidden" name="csrf_token" value="<?= hPedido($_SESSION['csrf_meus_pedidos']) ?>">
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash me-1"></i>Excluir pedido</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</main>
</body>
</html>
