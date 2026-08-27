<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <title>Carrinho - LabMaker</title>
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

                            <li>
                                <a class="dropdown-item" href="Cadastros.php">
                                    Cadastros
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="Vendas.php">
                                    Vendas
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="Relatorios.php">
                                    Relatórios
                                </a>
                            </li>

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

                            <li>
                                <a class="dropdown-item" href="#">
                                    Processadores
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Placas-Mãe
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Placas de Vídeo
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Memórias RAM
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Armazenamento
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Fontes
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Refrigeração
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Gabinetes
                                </a>
                            </li>

                        </ul>

                    </li>


                    <!-- Conta -->
                    <li class="nav-item ms-3 fs-3">

                        <a class="nav-link" href="MinhaConta.php">
                            <i class="bi bi-person"></i>
                        </a>

                    </li>


                    <!-- Carrinho -->
                    <li class="nav-item ms-3 fs-3">

                        <a class="nav-link active" href="Carrinho.php">
                            <i class="bi bi-cart"></i>
                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>


    <!-- Conteúdo -->
    <main class="container py-5">

        <!-- Título -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold">
                    <i class="bi bi-cart3"></i>
                    Meu Carrinho
                </h2>

                <p class="text-muted mb-0">
                    Confira os produtos antes de finalizar sua compra.
                </p>

            </div>

            <a href="Main-Cliente.php" class="btn btn-outline-primary">

                <i class="bi bi-arrow-left"></i>
                Continuar comprando

            </a>

        </div>


        <div class="row g-4">


            <!-- Produtos -->
            <div class="col-lg-8">

                <!-- Frete -->
                <div class="card shadow-sm">

                    <div class="card-body">

                        <h5 class="fw-bold">

                            <i class="bi bi-truck text-primary"></i>
                            Calcular frete

                        </h5>

                        <p class="text-muted">
                            Informe seu CEP para calcular o valor da entrega.
                        </p>


                        <div class="row g-2">

                            <div class="col-md-5">

                                <input type="text" class="form-control" placeholder="00000-000">

                            </div>

                            <div class="col-md-auto">

                                <button class="btn btn-primary">

                                    Calcular

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Resumo -->
            <div class="col-lg-4">

                <div class="card shadow-sm">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">
                            Resumo da compra
                        </h4>


                        <!-- Subtotal -->
                        <div class="d-flex justify-content-between mb-3">

                            <span>
                                Subtotal
                            </span>

                            <span>
                                R$ 2.149,97
                            </span>

                        </div>


                        <!-- Frete -->
                        <div class="d-flex justify-content-between mb-3">

                            <span>
                                Frete
                            </span>

                            <span class="text-primary">
                                Calcular
                            </span>

                        </div>


                        <hr>


                        <!-- Total -->
                        <div class="d-flex justify-content-between mb-2">

                            <span class="fw-bold fs-5">
                                Total
                            </span>

                            <span class="fw-bold fs-4">
                                R$ 2.149,97
                            </span>

                        </div>


                        <p class="text-muted text-end small">
                            ou até 10x sem juros
                        </p>


                        <!-- Botão -->
                        <div class="d-grid mt-4">

                            <button class="btn btn-primary btn-lg">

                                <i class="bi bi-lock-fill"></i>
                                Finalizar compra

                            </button>

                        </div>


                        <!-- Segurança -->
                        <div class="mt-4">

                            <div class="d-flex align-items-center mb-3">

                                <i class="bi bi-shield-check text-primary fs-3 me-3"></i>

                                <div>

                                    <strong>Compra segura</strong>

                                    <p class="text-muted small mb-0">
                                        Seus dados estão protegidos.
                                    </p>

                                </div>

                            </div>


                            <div class="d-flex align-items-center">

                                <i class="bi bi-credit-card text-primary fs-3 me-3"></i>

                                <div>

                                    <strong>Pagamento facilitado</strong>

                                    <p class="text-muted small mb-0">
                                        Até 10x sem juros.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</body>

</html>