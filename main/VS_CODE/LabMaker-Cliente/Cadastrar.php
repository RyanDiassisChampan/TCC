<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <title>Cadastro - LabMaker</title>
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-8 col-lg-6">

                <div class="card shadow border-0">

                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">
                            <i class="bi bi-person-plus-fill"></i>
                            Cadastro de Usuário
                        </h3>
                    </div>

                    <div class="card-body">

                        <form method="post">

                            <!-- Nome -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Nome Completo
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>

                                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome"
                                        required>

                                </div>

                            </div>

                            <!-- Email -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>

                                    <input type="email" class="form-control" name="email"
                                        placeholder="Digite seu e-mail" required>

                                </div>

                            </div>

                            <div class="row">

                                <!-- CPF -->
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        CPF
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="bi bi-card-text"></i>
                                        </span>

                                        <input type="text" class="form-control" name="cpf" placeholder="000.000.000-00"
                                            required>

                                    </div>

                                </div>

                                <!-- Senha -->
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Senha
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            <i class="bi bi-lock"></i>
                                        </span>

                                        <input type="password" class="form-control" name="senha"
                                            placeholder="Digite sua senha" required>

                                    </div>

                                </div>

                            </div>

                            <!-- Confirmar senha -->
                            <div class="mb-4">

                                <label class="form-label">
                                    Confirmar Senha
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-shield-lock"></i>
                                    </span>

                                    <input type="password" class="form-control" name="confirmarSenha"
                                        placeholder="Confirme sua senha" required>

                                </div>

                            </div>

                            <!-- Botões -->
                            <div class="d-flex justify-content-between">

                                <button type="button" class="btn btn-outline-secondary" onclick="history.back()">

                                    <i class="bi bi-arrow-left"></i>
                                    Voltar

                                </button>

                                <button type="submit" name="salvar" class="btn btn-success">

                                    <i class="bi bi-check-circle"></i>
                                    Cadastrar

                                </button>

                            </div>

                            <!-- Mensagem -->
                            <?php if (isset($_POST['salvar'])) { ?>

                                <div class="alert alert-success mt-4">

                                    <i class="bi bi-check-circle-fill"></i>

                                    <?= $mensagem ?>

                                </div>

                            <?php } ?>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>