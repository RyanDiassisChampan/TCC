<?php
$conexao = mysqli_connect("localhost", "root", "", "tcc");
if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}
mysqli_set_charset($conexao, "utf8mb4");

$busca = trim($_GET['busca'] ?? '');
$status = $_GET['status'] ?? '';
$dataInicial = $_GET['data_inicial'] ?? '';
$dataFinal = $_GET['data_final'] ?? '';

$vendas = [];
$totalVendas = 0;
$valorTotal = 0;

$sql = "SELECT v.Codigo, v.Data, v.Valor_Total, v.Status, v.FormaRecebimento,
               c.Nome AS Cliente,
               COALESCE(GROUP_CONCAT(CONCAT(p.Modelo, ' (', vp.Qtd_Produto, 'x)') SEPARATOR ', '), '-') AS Produtos
        FROM tbVenda v
        INNER JOIN tbCliente c ON c.Codigo = v.tbCliente_Codigo
        LEFT JOIN tbVenda_Produto vp ON vp.tbVenda_Codigo = v.Codigo
        LEFT JOIN tbProduto p ON p.Codigo = vp.tbProduto_Codigo
        WHERE 1=1";

$parametros = [];
$tipos = '';

if ($busca !== '') {
    $sql .= " AND (CAST(v.Codigo AS CHAR) LIKE ? OR c.Nome LIKE ?)";
    $termo = "%$busca%";
    $parametros[] = $termo;
    $parametros[] = $termo;
    $tipos .= 'ss';
}

if ($status !== '') {
    $sql .= " AND v.Status = ?";
    $parametros[] = $status;
    $tipos .= 's';
}

if ($dataInicial !== '') {
    $sql .= " AND v.Data >= ?";
    $parametros[] = $dataInicial;
    $tipos .= 's';
}

if ($dataFinal !== '') {
    $sql .= " AND v.Data <= ?";
    $parametros[] = $dataFinal;
    $tipos .= 's';
}

$sql .= " GROUP BY v.Codigo, v.Data, v.Valor_Total, v.Status, v.FormaRecebimento, c.Nome
          ORDER BY v.Data DESC, v.Codigo DESC";

$stmt = mysqli_prepare($conexao, $sql);
if ($stmt) {
    if ($parametros) {
        mysqli_stmt_bind_param($stmt, $tipos, ...$parametros);
    }
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $vendas[] = $linha;
        $totalVendas++;
        $valorTotal += (float) $linha['Valor_Total'];
    }
    mysqli_stmt_close($stmt);
}

function h($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}
function valorReal($valor)
{
    return 'R$ ' . number_format((float) $valor, 2, ',', '.');
}
function classeStatus($status)
{
    $status = strtolower((string) $status);
    if ($status === 'pago')
        return 'bg-success';
    if ($status === 'pendente')
        return 'bg-warning text-dark';
    if ($status === 'cancelado')
        return 'bg-danger';
    return 'bg-secondary';
}

include("../../includes/headerAdmin.php");
?>


    <!-- Conteúdo -->
    <main class="container-fluid px-4 py-4">

        <!-- Cabeçalho -->
        <div class="mb-4">

            <h2>
                Relatório de Vendas
            </h2>

            <p class="text-muted">
                Consulte e acompanhe as vendas realizadas na LabMaker.
            </p>

        </div>


        <!-- Filtros -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="GET">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Pesquisar</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" name="busca" class="form-control"
                                    placeholder="Código da venda ou cliente" value="<?= h($busca) ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="" <?= $status === '' ? 'selected' : '' ?>>Todos</option>
                                <option value="Pago" <?= $status === 'Pago' ? 'selected' : '' ?>>Pago</option>
                                <option value="Pendente" <?= $status === 'Pendente' ? 'selected' : '' ?>>Pendente</option>
                                <option value="Cancelado" <?= $status === 'Cancelado' ? 'selected' : '' ?>>Cancelado
                                </option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Data inicial</label>
                            <input type="date" name="data_inicial" class="form-control" value="<?= h($dataInicial) ?>">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Data final</label>
                            <input type="date" name="data_final" class="form-control" value="<?= h($dataFinal) ?>">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100"><i class="bi bi-funnel"></i>
                                Filtrar</button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="Relatorios_Vendas.php" class="btn btn-outline-secondary btn-sm"><i
                                class="bi bi-eraser"></i> Limpar filtros</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Resumo -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body"><small class="text-muted">Vendas encontradas</small>
                        <h4 class="mb-0"><?= $totalVendas ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body"><small class="text-muted">Valor total</small>
                        <h4 class="mb-0"><?= valorReal($valorTotal) ?></h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">

            <!-- Tabela -->
            <div class="card shadow-sm">

                <div class="card-header bg-white">

                    <h5 class="mb-0">
                        Histórico de vendas
                    </h5>

                </div>


                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">

                                <tr>

                                    <th class="ps-4" style="width: 11%;">
                                        Código
                                    </th>

                                    <th style="width: 11%;">
                                        Data
                                    </th>

                                    <th style="width: 11%;">
                                        Cliente
                                    </th>

                                    <th style="width: 11%;">
                                        Produtos
                                    </th>

                                    <th style="width: 13%;">
                                        Forma de Recebimento
                                    </th>

                                    <th style="width: 11%;">
                                        Valor Recebido
                                    </th>

                                    <th style="width: 11%;">
                                        Total
                                    </th>

                                    <th style="width: 10%;">
                                        Status
                                    </th>

                                    <th class="text-center pe-4" style="width: 11%;">
                                        Ações
                                    </th>

                                </tr>

                            </thead>

                            <tbody>
                                <?php if (empty($vendas)) { ?>
                                    <tr>
                                        <td colspan="9" class="text-center text-muted py-4">Nenhuma venda encontrada.</td>
                                    </tr>
                                <?php } else { ?>
                                    <?php foreach ($vendas as $venda) { ?>
                                        <tr>
                                            <td class="ps-4"><?= h($venda['Codigo']) ?></td>
                                            <td><?= $venda['Data'] ? date('d/m/Y', strtotime($venda['Data'])) : '-' ?></td>
                                            <td><?= h($venda['Cliente']) ?></td>
                                            <td><?= h($venda['Produtos']) ?></td>
                                            <td><?= h($venda['FormaRecebimento']) ?></td>
                                            <td><?= strtolower((string) $venda['Status']) === 'pago' ? valorReal($venda['Valor_Total']) : '-' ?>
                                            </td>
                                            <td><?= valorReal($venda['Valor_Total']) ?></td>
                                            <td><span
                                                    class="badge <?= classeStatus($venda['Status']) ?>"><?= h($venda['Status']) ?></span>
                                            </td>
                                            <td class="text-center pe-4">-</td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>
        </div>

        <div class="mt-3">
            <a href="javascript:history.back()" class="btn btn-primary">

                <i class="bi bi-arrow-left"></i>
                Voltar

            </a>
        </div>

    </main>

</body>

</html>