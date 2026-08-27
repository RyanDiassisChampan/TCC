<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Cadastro de Funcionário</title>
</head>

<body>

    <main class="container" style="max-width: 850px; margin-top: 50px; margin-bottom: 50px;">

        <div class="card shadow">

            <div class="card-header bg-primary text-white text-center">
                <h3 style="margin: 0;">
                    <i class="bi bi-person-badge"></i>
                    Cadastro de Funcionário
                </h3>
            </div>

            <div class="card-body">

                <form>

                    <h5 class="mb-3">
                        <i class="bi bi-person"></i>
                        Dados pessoais
                    </h5>

                    <div class="mb-3">

                        <label for="nome" class="form-label">
                            Nome
                        </label>

                        <input type="text" class="form-control" id="nome" name="nome" maxlength="100" required>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="cpf" class="form-label">
                                CPF
                            </label>

                            <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14"
                                placeholder="000.000.000-00" required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label for="telefone" class="form-label">
                                Telefone
                            </label>

                            <input type="text" class="form-control" id="telefone" name="telefone" maxlength="15"
                                placeholder="(00) 00000-0000">

                        </div>

                    </div>

                    <div class="mb-3">

                        <label for="email" class="form-label">
                            E-mail
                        </label>

                        <input type="email" class="form-control" id="email" name="email" maxlength="100" required>

                    </div>

                    <hr>

                    <h5 class="mb-3">
                        <i class="bi bi-shield-lock"></i>
                        Acesso
                    </h5>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="senha" class="form-label">
                                Senha
                            </label>

                            <input type="password" class="form-control" id="senha" name="senha" maxlength="255"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label for="status" class="form-label">
                                Status
                            </label>

                            <select class="form-select" id="status" name="status">

                                <option value="Ativo">
                                    Ativo
                                </option>

                                <option value="Inativo">
                                    Inativo
                                </option>

                            </select>

                        </div>

                    </div>

                    <hr>

                    <h5 class="mb-3">
                        <i class="bi bi-house"></i>
                        Endereço
                    </h5>

                    <div class="row">

                        <div class="col-md-9 mb-3">

                            <label for="logradouro" class="form-label">
                                Logradouro
                            </label>

                            <input type="text" class="form-control" id="logradouro" name="logradouro" maxlength="45">

                        </div>

                        <div class="col-md-3 mb-3">

                            <label for="numero" class="form-label">
                                Número
                            </label>

                            <input type="text" class="form-control" id="numero" name="numero" maxlength="10">

                        </div>

                    </div>

                    <div class="mb-3">

                        <label for="bairro" class="form-label">
                            Bairro
                        </label>

                        <input type="text" class="form-control" id="bairro" name="bairro" maxlength="100">

                    </div>

                    <div class="row">

                        <div class="col-md-7 mb-3">

                            <label for="cidade" class="form-label">
                                Cidade
                            </label>

                            <input type="text" class="form-control" id="cidade" name="cidade" maxlength="100">

                        </div>

                        <div class="col-md-2 mb-3">

                            <label for="estado" class="form-label">
                                UF
                            </label>

                            <input type="text" class="form-control" id="estado" name="estado" maxlength="2">

                        </div>

                        <div class="col-md-3 mb-3">

                            <label for="cep" class="form-label">
                                CEP
                            </label>

                            <input type="text" class="form-control" id="cep" name="cep" maxlength="10"
                                placeholder="00000-000">

                        </div>

                    </div>

                    <div class="mb-4">

                        <label for="complemento" class="form-label">
                            Complemento
                        </label>

                        <input type="text" class="form-control" id="complemento" name="complemento" maxlength="100">

                    </div>

                    <div class="d-flex justify-content-between">

                        <a href="javascript:history.back()" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Voltar
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-person-plus"></i>
                            Cadastrar Funcionário
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>

</html>