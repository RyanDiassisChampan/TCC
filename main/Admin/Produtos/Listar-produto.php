<?php

//1. Conectar no banco de dados (ip, usuário, senha, Modelo do banco)
$conexao = mysqli_connect('localhost', 'root', '', 'tcc');
if (isset($_GET['Codigo']) && filter_var($_GET['Codigo'], FILTER_VALIDATE_INT)) {
    $codigoExcluir = (int) $_GET['Codigo'];
    $stmtExcluir = mysqli_prepare($conexao, 'DELETE FROM tbProduto WHERE Codigo = ?');
    mysqli_stmt_bind_param($stmtExcluir, 'i', $codigoExcluir);
    mysqli_stmt_execute($stmtExcluir);
    mysqli_stmt_close($stmtExcluir);
    $mensagem = "Registro excluído com sucesso.";
}


//2. Prepara o SQL
$sql = "select * from tbProduto";

//3. Executar a SQL
$resultado = mysqli_query($conexao, $sql);

//5. Mostrar mensagem ao usuário
$mensagem = "Registro excluído com sucesso.";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>LabMaker</title>

    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container-fluid">

            <!-- Botão para telas pequenas -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse align-items-center" id="navbarPrincipal">

                <!-- Ações -->
                <ul class="navbar-nav me-3 align-items-center">
                    <li class="nav-item dropdown fs-5">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Ações
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Cadastros.php">Cadastros</a></li>
                            <li><a class="dropdown-item" href="../Relatorios.php">Relatórios</a></li>
                            <li><a class="dropdown-item" href="../Listagens.php">Listagens</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Logo -->
                <a class="navbar-brand fw-bold" href="../Main-Admin.php">
                    LabMaker
                </a>

                <!-- Pesquisa de produtos -->
                <form class="d-flex mx-auto w-50" method="GET" action="/TCC/main/Admin/Main-Admin.php" role="search">
                    <input class="form-control me-2" type="search" name="busca"
                        placeholder="Pesquisar produtos..." aria-label="Pesquisar produtos"
                        value="<?= htmlspecialchars($_GET['busca'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    <button class="btn btn-light" type="submit">
                        Buscar
                    </button>
                </form>

                <!-- Menu direito -->
                <ul class="navbar-nav align-items-center">

                    <li class="nav-item ms-3 fs-3">
                        <a class="nav-link" href="../Minha_Conta_Admin.php">
                            <i class="bi bi-person"></i>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <div class="container">
        <?php if (isset($_GET['Codigo'])) { ?>
            <div class="alert alert-success" role="alert">
                <i class="bi bi-check-circle"></i>
                <?= $mensagem ?>
            </div>
        <?php } ?>

        <div class="card mt-3 mb-3">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-card-list"></i> Listagem de Produto </h5>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Quantidade em Estoque</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <th><?= $linha['Codigo'] ?> </th>
                        <td class="align-middle">
                            <?php if (!empty($linha['Imagem']) && is_file(__DIR__ . '/../../../imagens/' . basename($linha['Imagem']))) { ?>
                                <img src="../../../imagens/<?= rawurlencode(basename($linha['Imagem'])) ?>" alt="Imagem de <?= htmlspecialchars($linha['Modelo'], ENT_QUOTES, 'UTF-8') ?>" class="img-thumbnail" style="width: 76px; height: 68px; object-fit: contain; background: #fff;">
                            <?php } else { ?>
                                <span class="text-muted small">Sem imagem</span>
                            <?php } ?>
                        </td>
                        <td class="align-middle"><?= htmlspecialchars($linha['Modelo'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($linha['Descricao'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td>R$ <?= number_format((float)$linha['Valor'], 2, ',', '.') ?></td>
                        <td><?= (int)$linha['Qntd_Estoque'] ?></td>
                        <td><?= htmlspecialchars($linha['Status'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td>
                            <a class="btn btn-warning" href="Alterar-produto.php?Codigo=<?= $linha['Codigo'] ?>"><i
                                    class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger" href="Listar-Produto.php?Codigo=<?= $linha['Codigo'] ?>"
                                onclick="return confirm('Deseja excluir este registro?')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</body>

</html>