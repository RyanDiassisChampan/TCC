<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$busca = trim($_GET['busca'] ?? '');
$clienteConectado = !empty($_SESSION['id']) && (($_SESSION['tipo'] ?? '') === 'cliente');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">

      <ul class="navbar-nav me-3 align-items-center">
        <li class="nav-item ms-3 fs-3">
          <a class="nav-link" href="/TCC/main/Admin/Main-Admin.php"><i class="bi bi-person-fill-lock"></i></a>
        </li>
      </ul>

      <a class="navbar-brand fw-bold" href="/TCC/main/Cliente/index.php">
        LabMaker
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrincipal">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarPrincipal">

        <!-- Barra de pesquisa -->
        <form class="d-flex mx-auto w-50" method="GET" action="/TCC/main/Cliente/index.php">
          <input class="form-control me-2" type="search" name="busca" placeholder="Pesquisar produtos..."
            value="<?php echo htmlspecialchars($busca, ENT_QUOTES, 'UTF-8'); ?>">
          <button class="btn btn-light" type="submit">
            Buscar
          </button>
        </form>

        <!-- Menu -->
        <ul class="navbar-nav ms-auto">

          <li class="nav-item ms-3 fs-3">
            <a class="nav-link" href="<?php echo $clienteConectado ? '/TCC/main/Cliente/Minha_Conta_Cliente.php' : '/TCC/main/Cliente/Login.php'; ?>" title="<?php echo $clienteConectado ? 'Minha conta' : 'Entrar'; ?>"><i class="bi bi-person"></i></a>
          </li>

          <li class="nav-item ms-3 fs-3">
            <a class="nav-link" href="/TCC/main/Cliente/Carrinho.php" title="Carrinho de compras"><i class="bi bi-cart"></i></a>
          </li>

        </ul>

      </div>
    </div>
  </nav>
