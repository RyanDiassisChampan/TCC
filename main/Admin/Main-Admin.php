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

    <!-- Título -->
    <div class="container mt-5">

        <h2 class="text-center mb-4">
            Produtos em destaque
        </h2>

        <!-- Cards -->
        <div class="row g-4">

            <!-- Card -->
            <div class="col-md-6 col-lg-3">
                <a href="item-teste.php" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        <img src="../../imagens/ryzen_55600GT.jpg" class="card-img-top" alt="Produto">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                Ryzen 5 5600GT
                            </h5>

                            <p class="card-text">
                                Processador AMD de alto desempenho para computadores e jogos.
                            </p>

                            <h5 class="text-primary mt-auto">
                                R$ 849,90
                            </h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card -->
            <div class="col-md-6 col-lg-3">
                <a href="item-teste.php" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        <img src="../../imagens/corsair_vengeance_16GB_2x8.jpg" class="card-img-top" alt="Produto">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                Corsair Vengeance 16GB DDR4 (2x8)
                            </h5>

                            <p class="card-text">
                                Memória RAM DDR4 de alta velocidade para maior desempenho.
                            </p>

                            <h5 class="text-primary mt-auto">
                                R$ 450,00
                            </h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card -->
            <div class="col-md-6 col-lg-3">
                <a href="item-teste.php" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        <img src="../../imagens/ssd_kingston_NV3_1TB.jpg" class="card-img-top" alt="Produto">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                Kingston NV3 1TB
                            </h5>

                            <p class="card-text">
                                SSD NVMe de 1TB com alta velocidade para armazenamento.
                            </p>

                            <h5 class="text-primary mt-auto">
                                R$ 499,90
                            </h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card -->
            <div class="col-md-6 col-lg-3">
                <a href="item-teste.php" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        <img src="../../imagens/placa-mae_gigabyte_B550M_aorus_elite.jpg" class="card-img-top"
                            alt="Produto">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                Gigabyte B550m Aorus Elite
                            </h5>

                            <p class="card-text">
                                Placa-mãe AM4 com excelente suporte para processadores AMD.
                            </p>

                            <h5 class="text-primary mt-auto">
                                R$ 899,90
                            </h5>
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </div>

</body>

</html>