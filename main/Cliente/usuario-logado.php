<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <title>Minha Conta - LabMaker</title>
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">

            <a class="navbar-brand fw-bold" href="LabMaker-Main.php">
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

    <div class="container mt-5">

        <h2 class="mb-4">
            Minha Conta
        </h2>

        <div class="row">

            <!-- Perfil -->
            <div class="col-lg-4 mb-4">

                <div class="card shadow">

                    <div class="card-body text-center">

                        <img src="https://placehold.co/150" class="rounded-circle mb-3" alt="Foto do usuário">

                        <h4>João da Silva</h4>

                        <p class="text-muted">
                            joao@email.com
                        </p>

                        <button class="btn btn-primary w-100">
                            Editar Perfil
                        </button>

                    </div>

                </div>

            </div>

            <!-- Opções -->
            <div class="col-lg-8">

                <div class="card shadow">

                    <div class="card-header">
                        Gerenciamento da Conta
                    </div>

                    <div class="list-group list-group-flush">

                        <a href="#" class="list-group-item list-group-item-action">
                            📦 Meus Pedidos
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            ❤️ Lista de Desejos
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            📍 Meus Endereços
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            💳 Formas de Pagamento
                        </a>

                        <a href="RedefinirSenha.php" class="list-group-item list-group-item-action">
                            🔒 Alterar Senha
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            ⚙ Configurações da Conta
                        </a>

                    </div>

                </div>

                <div class="card shadow mt-4">

                    <div class="card-body">

                        <h5>Informações Pessoais</h5>

                        <hr>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" value="João da Silva">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control" value="joao@email.com">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Telefone</label>
                                <input type="text" class="form-control" value="(44) 99999-9999">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">CPF</label>
                                <input type="text" class="form-control" value="000.000.000-00">
                            </div>

                        </div>

                        <button class="btn btn-success">
                            Salvar Alterações
                        </button>

                    </div>

                </div>

                <div class="text-end mt-4">
                    <button class="btn btn-danger">
                        Sair da Conta
                    </button>
                </div>

            </div>

        </div>

    </div>

</body>

</html>