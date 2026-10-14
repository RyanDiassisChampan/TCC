<?php include("../../includes/headerAdmin.php");?>


    <!-- Conteúdo -->
    <main class="container mt-4 mb-5">

        <h2 class="mb-4">
            <i class="bi bi-person-circle"></i> Minha Conta
        </h2>

        <div class="row">

            <!-- Menu lateral -->
            <div class="col-md-3 mb-4">

                <div class="card shadow-sm">

                    <div class="card-body">

                        <h5 class="card-title mb-3">
                            Olá, Ryan!
                        </h5>

                        <div class="list-group">

                            <a href="#" class="list-group-item list-group-item-action active">
                                <i class="bi bi-person me-2"></i>
                                Meus Dados
                            </a>
                            <a href="#" class="list-group-item list-group-item-action text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Sair
                            </a>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Dados da conta -->
            <div class="col-md-9">

                <div class="card shadow-sm">

                    <div class="card-body">

                        <h4 class="mb-4">
                            Meus Dados
                        </h4>

                        <div class="row">

                            <!-- Nome -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    Nome completo
                                </label>

                                <input type="text" class="form-control" placeholder="Nome completo">
                            </div>

                            <!-- CPF -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    CPF
                                </label>

                                <input type="text" class="form-control" placeholder="000.000.000-00">
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    E-mail
                                </label>

                                <input type="email" class="form-control" placeholder="email@exemplo.com">
                            </div>

                            <!-- Telefone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    Telefone
                                </label>

                                <input type="text" class="form-control" placeholder="(44) 99999-9999">
                            </div>

                        </div>

                        <hr class="my-4">

                        <!-- Endereço -->
                        <h5 class="mb-3">
                            <i class="bi bi-geo-alt"></i> Endereço principal
                        </h5>

                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    CEP
                                </label>

                                <input type="text" class="form-control" placeholder="00000-000">
                            </div>

                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-bold">
                                    Endereço
                                </label>

                                <input type="text" class="form-control" placeholder="Rua Exemplo">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    Número
                                </label>

                                <input type="text" class="form-control" placeholder="Número">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    Cidade
                                </label>

                                <input type="text" class="form-control" placeholder="Cidade">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    Estado
                                </label>

                                <input type="text" class="form-control" placeholder="PR">
                            </div>

                        </div>

                        <!-- Botão -->
                        <div class="text-end mt-3">

                            <button class="btn btn-primary">
                                <i class="bi bi-pencil"></i>
                                Editar dados
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</body>

</html>F