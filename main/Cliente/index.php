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

include"../../includes/header.php ";
?>

  <!-- Título -->
  <div class="container mt-5">

    <h2 class="text-center mb-4">
      Produtos em destaque
    </h2>

    <!-- Cards -->
    <div class="row g-4">

      <?php if (mysqli_num_rows($resultado) === 0 && $busca !== '') { ?>
        <div class="col-12">
          <div class="alert alert-secondary text-center shadow-sm">
            Nenhum produto encontrado para
            <strong><?php echo htmlspecialchars($busca, ENT_QUOTES, 'UTF-8'); ?></strong>.
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