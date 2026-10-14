<?php include("../../includes/headerAdmin.php");?>

    <!-- Conteúdo -->
    <main class="container py-5">

        <h2 class="text-center mb-2">
            Relatórios
        </h2>

        <p class="text-center text-muted mb-5">
            Selecione o tipo de relatório que deseja emitir.
        </p>


        <!-- Cards -->
        <div class="row g-4 justify-content-center">


            <!-- Relatório de Vendas -->
            <div class="col-md-6 col-lg-4">

                <a href="Relatorios_Vendas.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-currency-dollar fs-1"></i>

                            <h4 class="card-title mt-3">
                                Relatório de Vendas
                            </h4>

                            <p class="text-muted">
                                Consulte as vendas realizadas,
                                valores e informações dos pedidos.
                            </p>

                            <span class="btn btn-primary">
                                Acessar
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </div>

                </a>

            </div>


            <!-- Relatório de Estoque -->
            <div class="col-md-6 col-lg-4">

                <a href="Relatorios_Estoque.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-box-seam-fill fs-1"></i>

                            <h4 class="card-title mt-3">
                                Relatório de Estoque
                            </h4>

                            <p class="text-muted">
                                Consulte os produtos disponíveis,
                                quantidades e situação do estoque.
                            </p>

                            <span class="btn btn-primary">
                                Acessar
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </div>

                </a>

            </div>


        </div>

    </main>

</body>

</html>