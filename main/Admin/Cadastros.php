<?php include("../../includes/headerAdmin.php");?>


    <!-- Conteúdo -->
    <main class="container py-5">

        <h2 class="text-center mb-2">
            Cadastros
        </h2>

        <p class="text-center text-muted mb-5">
            Selecione o tipo de cadastro que deseja acessar.
        </p>


        <!-- Cards -->
        <div class="row g-4 justify-content-center">

            <!-- Produtos -->
            <div class="col-md-6 col-lg-4">

                <a href="Produtos/Cadastrar-produto.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-box-seam-fill text-primary fs-1"></i>

                            <h4 class="card-title mt-3">
                                Produtos
                            </h4>

                            <p class="card-text text-muted">
                                Cadastre e gerencie os produtos disponíveis.
                            </p>

                            <span class="btn btn-primary">
                                Acessar
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </div>

                    </div>

                </a>

            </div>

            <!-- Funcionários -->
            <div class="col-md-6 col-lg-4">

                <a href="Funcionarios/Cadastrar-funcionario.php" class="text-decoration-none text-dark">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-person-badge-fill text-primary fs-1"></i>

                            <h4 class="card-title mt-3">
                                Funcionários
                            </h4>

                            <p class="card-text text-muted">
                                Cadastre e gerencie os funcionários do sistema.
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