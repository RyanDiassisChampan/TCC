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

            <ul class="navbar-nav me-3 align-items-center">
                <li class="nav-item ms-3 fs-3">
                    <a class="nav-link" href="../Admin/Main-Admin.php">
                        <i class="bi bi-person-fill-lock"></i>
                    </a>
                </li>
            </ul>

            <a class="navbar-brand fw-bold" href="index.php">
                LabMaker
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarPrincipal">

                <!-- Barra de pesquisa -->
                <form class="d-flex mx-auto w-50">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar produtos...">

                    <button class="btn btn-light" type="submit">
                        Buscar
                    </button>
                </form>

                <!-- Menu -->
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item ms-3 fs-3">
                        <a class="nav-link" href="Minha_Conta_Cliente.php">
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
        </div>
    </nav>


    <!-- Conteúdo -->
    <main class="container py-5">

        <!-- Título -->
        <div class="mb-4">

            <h2 class="fw-bold">
                <i class="bi bi-cart3"></i>
                Meu Carrinho
            </h2>

            <p class="text-muted mb-0">
                Confira os produtos antes de finalizar sua compra.
            </p>

        </div>


        <div class="row g-4">

            <!-- COLUNA DOS PRODUTOS -->
            <div class="col-lg-8">

                <!-- Lista de produtos -->
                <div class="card shadow-sm mb-4">

                    <div class="card-header bg-white">

                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-box-seam text-primary"></i>
                            Produtos no carrinho
                        </h5>

                    </div>

                </div>


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


            <!-- RESUMO DA COMPRA -->
            <div class="col-lg-4">

                <div class="card shadow-sm">

                    <div class="card-header bg-white">

                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-receipt text-primary"></i>
                            Resumo da compra
                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-2">

                            <span>Subtotal:</span>

                        </div>

                        <div class="d-flex justify-content-between mb-2">

                            <span>Frete:</span>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mb-3">

                            <span class="fw-bold fs-5">
                                Total:
                            </span>

                        </div>

                        <button class="btn btn-primary w-100 btn-lg">

                            <i class="bi bi-credit-card"></i>
                            Finalizar compra

                        </button>

                    </div>

                </div>

            </div>

        </div>


        <!-- Botão voltar -->
        <div class="mt-4">

            <a href="javascript:history.back()" class="btn btn-primary">

                <i class="bi bi-arrow-left"></i>
                Voltar

            </a>

        </div>

    </main>

</body>

</html>