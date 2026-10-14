<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <title>LabMaker</title>

  <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">

      <ul class="navbar-nav me-3 align-items-center">
        <li class="nav-item ms-3 fs-3">
          <a class="nav-link" href="../Admin/Main-Admin.php"><i class="bi bi-person-fill-lock"></i></a>
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
        <form class="d-flex mx-auto w-50" method="GET" action="index.php">
          <input class="form-control me-2" type="search" name="busca" placeholder="Pesquisar produtos..."
            value="<?php echo htmlspecialchars($busca, ENT_QUOTES, 'UTF-8'); ?>">
          <button class="btn btn-light" type="submit">
            Buscar
          </button>
        </form>

        <!-- Menu -->
        <ul class="navbar-nav ms-auto">

          <li class="nav-item ms-3 fs-3">
            <a class="nav-link" href="Minha_Conta_Cliente.php"><i class="bi bi-person"></i></a>
          </li>

          <li class="nav-item ms-3 fs-3">
            <a class="nav-link" href="Carrinho.php"><i class="bi bi-cart"></i></a>
          </li>

        </ul>

      </div>
    </div>
  </nav>