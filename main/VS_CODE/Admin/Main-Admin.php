<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>LabMaker</title>
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">

            <a class="navbar-brand fw-bold" href="LabMaker">
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

                    <li class="nav-item dropdown mt-2  fs-5">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Departamentos
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Processadores</a></li>
                            <li><a class="dropdown-item" href="#">Placas-Mãe</a></li>
                            <li><a class="dropdown-item" href="#">Placas de Vídeo</a></li>
                            <li><a class="dropdown-item" href="#">Memórias Ram</a></li>
                            <li><a class="dropdown-item" href="#">Armazenamento</a></li>
                            <li><a class="dropdown-item" href="#">Fonte</a></li>
                            <li><a class="dropdown-item" href="#">Refrigeração</a></li>
                            <li><a class="dropdown-item" href="#">Gabinete</a></li>
                            <li><a class="dropdown-item" href="#"></a></li>
                        </ul>
                    </li>

                    <li class="nav-item ms-3 fs-3">
                        <a class="nav-link" href="MinhaConta.php"><i class="bi bi-person"></i></a>
                    </li>

                    <li class="nav-item ms-3 fs-3">
                        <a class="nav-link" href="Carrinho.php"><i class="bi bi-cart"></i></a>
                    </li>

                </ul>

            </div>
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
                        <img src="https://placehold.co/300x200" class="card-img-top" alt="Produto">

                        <div class="card-body">
                            <h5 class="card-title">
                                Multímetro Digital
                            </h5>

                            <p class="card-text">
                                Equipamento ideal para medições elétricas com
                                excelente precisão.
                            </p>

                            <h5 class="text-primary">
                                R$ 89,90
                            </h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card -->
            <div class="col-md-6 col-lg-3">
                <a href="item-teste.php" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        <img src="https://placehold.co/300x200" class="card-img-top" alt="Produto">

                        <div class="card-body">
                            <h5 class="card-title">
                                Kit Arduino Uno
                            </h5>

                            <p class="card-text">
                                Kit completo para projetos de automação e robótica.
                            </p>

                            <h5 class="text-primary">
                                R$ 149,90
                            </h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card -->
            <div class="col-md-6 col-lg-3">
                <a href="item-teste.php" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        <img src="https://placehold.co/300x200" class="card-img-top" alt="Produto">

                        <div class="card-body">
                            <h5 class="card-title">
                                Sensor Ultrassônico
                            </h5>

                            <p class="card-text">
                                Sensor para medição de distância utilizado em diversos projetos.
                            </p>

                            <h5 class="text-primary">
                                R$ 24,90
                            </h5>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card -->
            <div class="col-md-6 col-lg-3">
                <a href="item-teste.php" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        <img src="https://placehold.co/300x200" class="card-img-top" alt="Produto">

                        <div class="card-body">
                            <h5 class="card-title">
                                Fonte de Bancada
                            </h5>

                            <p class="card-text">
                                Fonte regulável para laboratórios e manutenção eletrônica.
                            </p>

                            <h5 class="text-primary">
                                R$ 329,90
                            </h5>
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </div>

</body>

</html>