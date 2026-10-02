<?php

$conn = mysqli_connect("localhost", "root", "", "tcc");

if (!$conn) {
  die("Erro na conexão com o banco: " . mysqli_connect_error());
}

$busca = trim($_GET['busca'] ?? '');

if ($busca !== '') {
  $termo = "%" . $busca . "%";

  $sql = "SELECT * FROM tbProduto
            WHERE Status = 'Ativo'
            AND (
                Modelo LIKE ?
                OR Descricao LIKE ?
                OR Marca LIKE ?
                OR Tipo LIKE ?
            )";

  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ssss", $termo, $termo, $termo, $termo);
  mysqli_stmt_execute($stmt);
  $resultado = mysqli_stmt_get_result($stmt);
} else {
  $sql = "SELECT * FROM tbProduto WHERE Status = 'Ativo'";
  $resultado = mysqli_query($conn, $sql);
}

?>

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

  <!-- Título -->
  <div class="container mt-5">

    <h2 class="text-center mb-4">
      Produtos em destaque
    </h2>

    <!-- Cards -->
    <div class="row g-4">

      <?php if (mysqli_num_rows($resultado) === 0) { ?>
        <div class="col-12">
          <div class="alert alert-secondary text-center shadow-sm">
            <?php if ($busca !== '') { ?>
              Nenhum produto encontrado para
              <strong><?php echo htmlspecialchars($busca, ENT_QUOTES, 'UTF-8'); ?></strong>.
            <?php } else { ?>
              Nenhum produto disponível no momento.
            <?php } ?>
          </div>
        </div>
      <?php } ?>

      <?php while ($produto = mysqli_fetch_assoc($resultado)) { ?>

        <div class="col-md-6 col-lg-3">

          <a href="tela_produto.php?Codigo=<?php echo $produto['Codigo']; ?>" class="text-decoration-none text-dark">

            <div class="card h-100 shadow-sm">

              <img src="../../imagens/<?php echo $produto['Imagem']; ?>" class="card-img-top"
                alt="<?php echo $produto['Modelo']; ?>">

              <div class="card-body d-flex flex-column">

                <h5 class="card-title">
                  <?php echo $produto['Modelo']; ?>
                </h5>

                <p class="card-text">
                  <?php echo $produto['Descricao']; ?>
                </p>

                <h5 class="text-primary mt-auto">
                  R$ <?php echo number_format($produto['Valor'], 2, ',', '.'); ?>
                </h5>

              </div>

            </div>

          </a>

        </div>

      <?php } ?>

    </div>

  </div>

</body>

</html>