<?php

$conn = mysqli_connect("localhost", "root", "", "tcc");

if (!$conn) {
    die("Erro na conexão com o banco: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tbProduto WHERE Status = 'Ativo'";
$resultado = mysqli_query($conn, $sql);
include("../../includes/headerAdmin.php");
?>

    <!-- Título -->
    <div class="container mt-5">

        <h2 class="text-center mb-4">
            Produtos em destaque
        </h2>

        <!-- Cards -->
        <div class="row g-4">

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

</body>

</html>