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
                            <li><a class="dropdown-item" href="/TCC/main/Admin/Cadastros.php">Cadastros</a></li>
                            <li><a class="dropdown-item" href="/TCC/main/Admin/Relatorios.php">Relatórios</a></li>
                            <li><a class="dropdown-item" href="/TCC/main/Admin/Listagens.php">Listagens</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Logo -->
                <a class="navbar-brand fw-bold" href="/TCC/main/Admin/Main-Admin.php">
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
                        <a class="nav-link" href="/TCC/main/Admin/Minha_Conta_Admin.php">
                            <i class="bi bi-person"></i>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
