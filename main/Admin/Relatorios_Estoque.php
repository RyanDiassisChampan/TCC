<?php
$conexao = mysqli_connect("localhost", "root", "", "tcc");
if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}
mysqli_set_charset($conexao, "utf8mb4");

$busca = trim($_GET['produto'] ?? '');
$tipo = $_GET['tipo'] ?? '';
$marca = $_GET['marca'] ?? '';
$situacao = $_GET['situacao'] ?? '';

$tipos = [];
$marcas = [];
$produtos = [];

$resultadoTipos = mysqli_query($conexao, "SELECT DISTINCT Tipo FROM tbProduto WHERE Tipo <> '' ORDER BY Tipo");
if ($resultadoTipos) {
    while ($linha = mysqli_fetch_assoc($resultadoTipos)) $tipos[] = $linha['Tipo'];
}
$resultadoMarcas = mysqli_query($conexao, "SELECT DISTINCT Marca FROM tbProduto WHERE Marca <> '' ORDER BY Marca");
if ($resultadoMarcas) {
    while ($linha = mysqli_fetch_assoc($resultadoMarcas)) $marcas[] = $linha['Marca'];
}

$sql = "SELECT Codigo, Modelo, Tipo, Marca, Qntd_Estoque, Valor, Status
        FROM tbProduto WHERE 1=1";
$parametros = [];
$tiposSql = '';

if ($busca !== '') {
    $sql .= " AND (Modelo LIKE ? OR CAST(Codigo AS CHAR) LIKE ? OR Descricao LIKE ?)";
    $termo = "%$busca%";
    $parametros[] = $termo;
    $parametros[] = $termo;
    $parametros[] = $termo;
    $tiposSql .= 'sss';
}
if ($tipo !== '') {
    $sql .= " AND Tipo = ?";
    $parametros[] = $tipo;
    $tiposSql .= 's';
}
if ($marca !== '') {
    $sql .= " AND Marca = ?";
    $parametros[] = $marca;
    $tiposSql .= 's';
}

if ($situacao === 'Em estoque') {
    $sql .= " AND Qntd_Estoque > 0";
} elseif ($situacao === 'Estoque baixo') {
    $sql .= " AND Qntd_Estoque BETWEEN 1 AND 5";
} elseif ($situacao === 'Sem estoque') {
    $sql .= " AND Qntd_Estoque <= 0";
}

$sql .= " ORDER BY Modelo ASC";
$stmt = mysqli_prepare($conexao, $sql);
if ($stmt) {
    if ($parametros) mysqli_stmt_bind_param($stmt, $tiposSql, ...$parametros);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    while ($linha = mysqli_fetch_assoc($resultado)) $produtos[] = $linha;
    mysqli_stmt_close($stmt);
}

function h($valor) { return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8'); }
function valorReal($valor) { return 'R$ ' . number_format((float)$valor, 2, ',', '.'); }
function situacao($quantidade) {
    if ((int)$quantidade <= 0) return ['Sem estoque', 'bg-danger'];
    if ((int)$quantidade <= 5) return ['Estoque baixo', 'bg-warning text-dark'];
    return ['Em estoque', 'bg-success'];
}
include("../../includes/headerAdmin.php");
?>
    <!-- Conteúdo -->
    <main class="container-fluid px-4 py-4">

        <!-- Título -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="mb-1">
                    Relatório de Estoque
                </h2>

                <p class="text-muted mb-1">
                    Consulte a quantidade e a situação dos produtos em estoque.
                </p>
            </div>

        </div>


        <!-- Filtros -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white"><h5 class="mb-0"><i class="bi bi-funnel"></i> Filtros</h5></div>
            <div class="card-body">
                <form method="GET">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Produto</label>
                            <input type="text" name="produto" class="form-control" placeholder="Nome, código ou descrição" value="<?= h($busca) ?>">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tipo</label>
                            <select name="tipo" class="form-select">
                                <option value="">Todos os Tipos</option>
                                <?php foreach ($tipos as $item) { ?>
                                    <option value="<?= h($item) ?>" <?= $tipo === $item ? 'selected' : '' ?>><?= h($item) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Marca</label>
                            <select name="marca" class="form-select">
                                <option value="">Todas as Marcas</option>
                                <?php foreach ($marcas as $item) { ?>
                                    <option value="<?= h($item) ?>" <?= $marca === $item ? 'selected' : '' ?>><?= h($item) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Situação</label>
                            <select name="situacao" class="form-select">
                                <option value="" <?= $situacao === '' ? 'selected' : '' ?>>Todas</option>
                                <option value="Em estoque" <?= $situacao === 'Em estoque' ? 'selected' : '' ?>>Em estoque</option>
                                <option value="Estoque baixo" <?= $situacao === 'Estoque baixo' ? 'selected' : '' ?>>Estoque baixo</option>
                                <option value="Sem estoque" <?= $situacao === 'Sem estoque' ? 'selected' : '' ?>>Sem estoque</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="Relatorios_Estoque.php" class="btn btn-secondary"><i class="bi bi-eraser"></i> Limpar</a>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Pesquisar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Resumo -->
        <div class="row g-4 mb-4">


            <!-- Tabela -->
            <div class="card shadow-sm">

                <div class="card-header bg-white">

                    <div class="d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">

                            <i class="bi bi-boxes"></i>
                            Produtos em Estoque

                        </h5>

                        <button class="btn btn-outline-primary btn-sm">

                            <i class="bi bi-printer"></i>
                            Imprimir

                        </button>

                    </div>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover table-bordered align-middle mb-0">

                            <thead class="table-light">

                                <tr>

                                    <th>
                                        Código
                                    </th>

                                    <th>
                                        Produto
                                    </th>

                                    <th>
                                        Tipo
                                    </th>

                                    <th>
                                        Marca
                                    </th>

                                    <th class="text-center">
                                        Quantidade
                                    </th>

                                    <th>
                                        Valor Unitário
                                    </th>

                                    <th>
                                        Valor em Estoque
                                    </th>

                                    <th class="text-center">
                                        Situação
                                    </th>

                                </tr>

                            </thead>


                            <tbody>
                                <?php if (empty($produtos)) { ?>
                                    <tr><td colspan="8" class="text-center text-muted py-4">Nenhum produto encontrado.</td></tr>
                                <?php } else { ?>
                                    <?php foreach ($produtos as $produto) {
                                        [$textoSituacao, $classeSituacao] = situacao($produto['Qntd_Estoque']);
                                        $valorEstoque = (float)$produto['Valor'] * (int)$produto['Qntd_Estoque'];
                                    ?>
                                        <tr>
                                            <td><?= h($produto['Codigo']) ?></td>
                                            <td><?= h($produto['Modelo']) ?></td>
                                            <td><?= h($produto['Tipo']) ?></td>
                                            <td><?= h($produto['Marca']) ?></td>
                                            <td class="text-center"><?= h($produto['Qntd_Estoque']) ?></td>
                                            <td><?= valorReal($produto['Valor']) ?></td>
                                            <td><?= valorReal($valorEstoque) ?></td>
                                            <td class="text-center"><span class="badge <?= $classeSituacao ?>"><?= $textoSituacao ?></span></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>

                        </table>

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