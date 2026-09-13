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

                    <li class="nav-item ms-3 fs-3">
                        <a class="nav-link" href="Minha_Conta_Admin.php">
                            <i class="bi bi-person"></i>
                        </a>
                    </li>

                </ul>

            </div>
    </nav>


    <!-- Conteúdo -->
    <main class="container py-5">

        <h2 class="text-center mb-2">
            Relatórios
        </h2>

        <p class="text-center text-muted mb-5">
            Selecione o tipo de relatório que deseja emitir.
        </p>


        <!-- Cards -->
        <div class="row g-4 justify-content-center">


            <!-- Relatório de Vendas -->
            <div class="col-md-6 col-lg-4">

                <a href="Relatorios_Vendas.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-currency-dollar fs-1"></i>

                            <h4 class="card-title mt-3">
                                Relatório de Vendas
                            </h4>

                            <p class="text-muted">
                                Consulte as vendas realizadas,
                                valores e informações dos pedidos.
                            </p>

                            <span class="btn btn-primary">
                                Acessar
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </div>

                </a>

            </div>


            <!-- Relatório de Estoque -->
            <div class="col-md-6 col-lg-4">

                <a href="Relatorios_Estoque.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-box-seam-fill fs-1"></i>

                            <h4 class="card-title mt-3">
                                Relatório de Estoque
                            </h4>

                            <p class="text-muted">
                                Consulte os produtos disponíveis,
                                quantidades e situação do estoque.
                            </p>

                            <span class="btn btn-primary">
                                Acessar
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </div>

                </a>

            </div>


        </div>

    </main>

</body>

</html>