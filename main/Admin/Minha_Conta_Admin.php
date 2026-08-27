<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
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
                        <a class="nav-link" href="Minha_Conta_Admin.php">
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


    <!-- Conteúdo -->
    <main class="container mt-4 mb-5">

        <h2 class="mb-4">
            <i class="bi bi-person-circle"></i> Minha Conta
        </h2>

        <div class="row">

            <!-- Menu lateral -->
            <div class="col-md-3 mb-4">

                <div class="card shadow-sm">

                    <div class="card-body">

                        <h5 class="card-title mb-3">
                            Olá, Ryan!
                        </h5>

                        <div class="list-group">

                            <a href="#" class="list-group-item list-group-item-action active">
                                <i class="bi bi-person me-2"></i>
                                Meus Dados
                            </a>

                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="bi bi-bag me-2"></i>
                                Meus Pedidos
                            </a>

                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="bi bi-geo-alt me-2"></i>
                                Meus Endereços
                            </a>

                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="bi bi-lock me-2"></i>
                                Alterar Senha
                            </a>

                            <a href="#" class="list-group-item list-group-item-action text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Sair
                            </a>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Dados da conta -->
            <div class="col-md-9">

                <div class="card shadow-sm">

                    <div class="card-body">

                        <h4 class="mb-4">
                            Meus Dados
                        </h4>

                        <div class="row">

                            <!-- Nome -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    Nome completo
                                </label>

                                <input type="text" class="form-control" value="Ryan Diassis Champan">
                            </div>

                            <!-- CPF -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    CPF
                                </label>

                                <input type="text" class="form-control" value="000.000.000-00">
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    E-mail
                                </label>

                                <input type="email" class="form-control" value="email@exemplo.com">
                            </div>

                            <!-- Telefone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    Telefone
                                </label>

                                <input type="text" class="form-control" value="(44) 99999-9999">
                            </div>

                        </div>

                        <hr class="my-4">

                        <!-- Endereço -->
                        <h5 class="mb-3">
                            <i class="bi bi-geo-alt"></i> Endereço principal
                        </h5>

                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    CEP
                                </label>

                                <input type="text" class="form-control" value="00000-000">
                            </div>

                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-bold">
                                    Endereço
                                </label>

                                <input type="text" class="form-control" value="Rua Exemplo">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    Número
                                </label>

                                <input type="text" class="form-control" value="123">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    Cidade
                                </label>

                                <input type="text" class="form-control" value="Umuarama">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    Estado
                                </label>

                                <input type="text" class="form-control" value="PR" readonly>
                            </div>

                        </div>

                        <!-- Botão -->
                        <div class="text-end mt-3">

                            <button class="btn btn-primary">
                                <i class="bi bi-pencil"></i>
                                Editar dados
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</body>

</html>F