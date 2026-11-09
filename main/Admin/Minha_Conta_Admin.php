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

                        <form method="post" novalidate>
                        <h4 class="mb-4">
                            Meus Dados
                        </h4>

                        <div class="row">

                            <!-- Nome -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    Nome completo
                                </label>

                                <input type="text" name="nome" class="form-control" placeholder="Nome completo" maxlength="100">
                            </div>

                            <!-- CPF -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    CPF
                                </label>

                                <input type="text" name="cpf" class="form-control" placeholder="000.000.000-00" maxlength="14">
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    E-mail
                                </label>

                                <input type="email" name="email" class="form-control" placeholder="email@exemplo.com" maxlength="100">
                            </div>

                            <!-- Telefone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    Telefone
                                </label>

                                <input type="text" name="telefone" class="form-control" placeholder="(44) 99999-9999" maxlength="15">
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

                                <input type="text" name="cep" class="form-control" placeholder="00000-000" maxlength="9">
                            </div>

                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-bold">
                                    Endereço
                                </label>

                                <input type="text" name="logradouro" class="form-control" placeholder="Rua Exemplo" maxlength="45">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    Número
                                </label>

                                <input type="text" name="numero" class="form-control" placeholder="Número" maxlength="10">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    Cidade
                                </label>

                                <input type="text" name="cidade" class="form-control" placeholder="Cidade" maxlength="100">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    Estado
                                </label>

                                <input type="text" name="estado" class="form-control" placeholder="PR" maxlength="2">
                            </div>

                        </div>

                        <!-- Botão -->
                        <div class="text-end mt-3">

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-pencil"></i>
                                Editar dados
                            </button>

                        </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </main>

    <script src="../../includes/validacoes.js"></script>

</body>

</html>F