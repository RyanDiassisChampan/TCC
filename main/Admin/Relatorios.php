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

    <title>Relatórios - LabMaker</title>
</head>

<body class="bg-light">

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
                            <li><a class="dropdown-item" href="Cadastros.php">Cadastros</a></li>
                            <li><a class="dropdown-item" href="Vendas.php">Vendas</a></li>
                            <li><a class="dropdown-item" href="Relatorios.php">Relatórios</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Logo -->
                <a class="navbar-brand fw-bold" href="Main-Admin.php">
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
                        <a class="nav-link" href="Login-Admin.php">
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


    <main class="container py-5">

        <h2 class="text-center mb-2">
            Relatórios
        </h2>

        <p class="text-center text-muted mb-5">
            Selecione o tipo de relatório que deseja emitir.
        </p>


        <!-- Cards -->
        <div class="row g-4 justify-content-center">


            <!-- Clientes -->
            <div class="col-md-6 col-lg-4">

                <a href="Clientes/Listar-cliente.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-person-plus-fill text-primary fs-1"></i>

                            <h4 class="card-title mt-3">
                                Clientes
                            </h4>

                            <span class="btn btn-primary">
                                Acessar
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </div>

                </a>

            </div>


            <!-- Produtos -->
            <div class="col-md-6 col-lg-4">

                <a href="Produtos/Listar-produto.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-box-seam-fill text-primary fs-1"></i>

                            <h4 class="card-title mt-3">
                                Produtos
                            </h4>
                            <span class="btn btn-primary">
                                Acessar
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </div>

                </a>

            </div>


            <!-- Forma de Recebimento -->
            <div class="col-md-6 col-lg-4">

                <a href="Tipos/Listar-tipo.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-list text-primary fs-1"></i>

                            <h4 class="card-title mt-3">
                                Tipos de Produtos
                            </h4>

                            <span class="btn btn-primary">
                                Acessar
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </div>

                </a>
            </div>

            <div class="col-md-6 col-lg-4">

                <a href="Formas_recebimento/Listar-forma_recebimento.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-list text-primary fs-1"></i>

                            <h4 class="card-title mt-3">
                                Formas de Recebimento
                            </h4>

                            <span class="btn btn-primary">
                                Acessar
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </div>

                </a>
            </div>

            <div class="col-md-6 col-lg-4">

                <a href="Marcas/Listar-marca.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-list text-primary fs-1"></i>

                            <h4 class="card-title mt-3">
                                Marcas
                            </h4>

                            <span class="btn btn-primary">
                                Acessar
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </div>

                </a>
            </div>

            <div class="col-md-6 col-lg-4">

                <a href="Funcionarios/Listar-funcionario.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-list text-primary fs-1"></i>

                            <h4 class="card-title mt-3">
                                Funcionários
                            </h4>

                            <span class="btn btn-primary">
                                Acessar
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </div>

                </a>
            </div>

    </main>

</body>

</html>