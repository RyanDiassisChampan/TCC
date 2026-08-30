<?php

//1. Conectar no banco de dados (ip, usuário, senha, nome do banco)
$conexao = mysqli_connect('localhost', 'root', '', 'tcc');
if (isset($_GET['id'])) {
    $sql = "delete from marca where id = " . $_GET['id'];
    mysqli_query($conexao, $sql);
    $mensagem = "Registro excluído com sucesso.";
}


//2. Prepara o SQL
$sql = "select * from marca";

//3. Executar a SQL
$resultado = mysqli_query($conexao, $sql);

//5. Mostrar mensagem ao usuário
$mensagem = "Registro exclído com sucesso.";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- Navbar -->
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
                            <li><a class="dropdown-item" href="../Vendas.php">Vendas</a></li>
                            <li><a class="dropdown-item" href="../Relatorios.php">Relatórios</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Logo -->
                <a class="navbar-brand fw-bold" href="../Main-Admin.php">
                    LabMaker
                </a>

                <!-- Pesquisa -->
                <form class="d-flex mx-auto w-50">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar produtos...">

                    <button class="btn btn-light" type="submit">
                        Buscar
                    </button>
                </form>

                <!-- Menu direito -->
                <ul class="navbar-nav align-items-center">

                    <!-- Departamentos -->
                    <li class="nav-item dropdown fs-5">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Departamentos
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Processadores</a></li>
                            <li><a class="dropdown-item" href="#">Placas-Mãe</a></li>
                            <li><a class="dropdown-item" href="#">Placas de Vídeo</a></li>
                            <li><a class="dropdown-item" href="#">Memórias RAM</a></li>
                            <li><a class="dropdown-item" href="#">Armazenamento</a></li>
                            <li><a class="dropdown-item" href="#">Fonte</a></li>
                            <li><a class="dropdown-item" href="#">Refrigeração</a></li>
                            <li><a class="dropdown-item" href="#">Gabinete</a></li>
                        </ul>
                    </li>

                    <li class="nav-item ms-3 fs-3">
                        <a class="nav-link" href="../Login-Admin.php">
                            <i class="bi bi-person"></i>
                        </a>
                    </li>

                    <li class="nav-item ms-3 fs-3">
                        <a class="nav-link" href="Carrinho.php">
                            <i class="bi bi-cart"></i>
                        </a>
                    </li>

                </ul>

            </div>
    </nav>
    <div class="container">
        <?php if (isset($_GET['id'])) { ?>
            <div class="alert alert-success" role="alert">
                <i class="bi bi-check-circle"></i>
                <?= $mensagem ?>
            </div>
        <?php } ?>

        <div class="card mt-3 mb-3">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-card-list"></i> Listagem de Marcas</h5>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <th><?= $linha['id'] ?> </th>
                        <td><?= $linha['nome'] ?></td>
                        <td><?= $linha['status'] ?></td>
                        <td>
                            <a class="btn btn-warning" href="cliente-alterar.php?id=<?= $linha['id'] ?>"><i
                                    class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-danger" href="cliente-listar.php?id=<?= $linha['id'] ?>"
                                onclick="return confirm('Deseja excluir este registro?')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>