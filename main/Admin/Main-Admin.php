<?php

$conn = mysqli_connect("localhost", "root", "", "tcc");

if (!$conn) {
    die("Erro na conexão com o banco: " . mysqli_connect_error());
}

$busca = trim($_GET['busca'] ?? '');

if ($busca !== '') {
    $termo = '%' . $busca . '%';
    $sql = "SELECT * FROM tbProduto
            WHERE Status = 'Ativo'
              AND (Modelo LIKE ? OR Descricao LIKE ? OR Tipo LIKE ? OR Marca LIKE ?)
            ORDER BY Modelo";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Erro ao preparar a pesquisa: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ssss", $termo, $termo, $termo, $termo);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
} else {
    $sql = "SELECT * FROM tbProduto WHERE Status = 'Ativo' ORDER BY Modelo";
    $resultado = mysqli_query($conn, $sql);
}

include("../../includes/headerAdmin.php");
?>

    <!-- Título -->
    <div class="container mt-5">

        <h2 class="text-center mb-4">
            <?= $busca !== '' ? 'Resultados da busca' : 'Produtos em destaque' ?>
        </h2>

        <?php if ($busca !== '') { ?>
            <p class="text-center text-muted mb-4">
                Pesquisa por: <strong><?= htmlspecialchars($busca, ENT_QUOTES, 'UTF-8') ?></strong>
            </p>
        <?php } ?>

        <!-- Cards -->
        <div class="row g-4">

            <?php if ($resultado && mysqli_num_rows($resultado) > 0) { ?>
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
            <?php } elseif ($busca !== '') { ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        <i class="bi bi-search"></i>
                        Nenhum produto encontrado para essa pesquisa.
                    </div>
                </div>
            <?php } ?>

        </div>

</body>

</html>