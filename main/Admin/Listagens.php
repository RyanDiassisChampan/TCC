<?php include("../../includes/headerAdmin.php");?>


    <!-- Conteúdo -->
    <main class="container py-5">

        <h2 class="text-center mb-2">
            Listagens
        </h2>

        <p class="text-center text-muted mb-5">
            Selecione o tipo de listagem que deseja consultar.
        </p>


        <!-- Cards -->
        <div class="row g-4 justify-content-center">

            <!-- Produtos -->
            <div class="col-md-6 col-lg-4">

                <a href="Produtos/Listar-produto.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-box-seam-fill text-primary fs-1"></i>

                            <h4 class="card-title mt-3">
                                Produtos
                            </h4>

                            <p class="card-text text-muted">
                                Consulte os produtos cadastrados no sistema.
                            </p>

                            <span class="btn btn-primary">
                                Acessar
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </div>

                </a>

            </div>

            <!-- Clientes -->
            <div class="col-md-6 col-lg-4">

                <a href="Clientes/Listar-cliente.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-people-fill text-primary fs-1"></i>

                            <h4 class="card-title mt-3">
                                Clientes
                            </h4>

                            <p class="card-text text-muted">
                                Consulte os clientes cadastrados no sistema.
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