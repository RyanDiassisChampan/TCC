<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow labmaker-navbar py-2" style="min-height: 72px;">
    <div class="container-fluid d-flex align-items-center gap-2">
        <ul class="navbar-nav me-lg-2 align-items-center flex-row">
            <li class="nav-item dropdown fs-5">
                <a class="nav-link dropdown-toggle px-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ações</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/TCC/main/Admin/Cadastros.php">Cadastros</a></li>
                    <li><a class="dropdown-item" href="/TCC/main/Admin/Relatorios.php">Relatórios</a></li>
                    <li><a class="dropdown-item" href="/TCC/main/Admin/Listagens.php">Listagens</a></li>
                </ul>
            </li>
        </ul>

        <a class="navbar-brand fw-bold m-0 flex-shrink-0" href="/TCC/main/Admin/Main-Admin.php">LabMaker</a>

        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrincipal" aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Abrir menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse align-items-center" id="navbarPrincipal">
            <form class="d-flex mx-lg-auto my-2 my-lg-0 w-100" style="max-width: 640px;" method="GET" action="/TCC/main/Admin/Main-Admin.php" role="search">
                <input class="form-control me-2" type="search" name="busca" placeholder="Pesquisar produtos..." aria-label="Pesquisar produtos" value="<?= htmlspecialchars($_GET['busca'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                <button class="btn btn-light" type="submit">Buscar</button>
            </form>

            <ul class="navbar-nav ms-lg-3 align-items-center flex-row justify-content-end">
                <li class="nav-item fs-3">
                    <a class="nav-link px-2" href="/TCC/main/Admin/Minha_Conta_Admin.php" title="Minha conta"><i class="bi bi-person"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
