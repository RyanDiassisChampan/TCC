<?php
//verificar se foi clicado no botão salvar
if (isset($_POST['salvar'])) {
    //1. Conectar no banco de dados (ip, usuário, senha, nome do banco)
    $conexao = mysqli_connect('localhost', 'root', '', 'tcc');

    //2. Preparar os dados para inserir
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $complemento = $_POST['complemento'];
    $cep = $_POST['cep'];
    $estado = $_POST['estado'];
    
    //3. Preparar a SQL para inserir
    $sql = "insert into tbfuncionario (nome, cpf, telefone, email, senha, logradouro, numero, bairro, cidade, complemento, cep, estado)
        values ('$nome', '$cpf', '$telefone', '$email', '$senha', '$logradouro', '$numero', '$bairro', '$cidade', '$complemento', '$cep', '$estado')";

    //4. Executar a SQL
    mysqli_query($conexao, $sql);

    //5. Mostrar mensagem ao usuário
    $mensagem = "Registro salvo com sucesso.";
}
?>

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

    <main class="container-fluid px-4" style="margin-top: 20px; margin-bottom: 20px;">

        <div class="card shadow">

            <!-- CABEÇALHO -->
            <div class="card-header bg-primary text-white text-center py-2">

                <h3 style="margin: 0;">
                    <i class="bi bi-person-plus"></i>
                    Cadastro de Funcionário
                </h3>

            </div>

            <div class="card-body py-3">

                <form method="post">

                    <!-- DADOS PESSOAIS -->
                    <h5 class="mb-2">
                        <i class="bi bi-person"></i>
                        Dados pessoais
                    </h5>

                    <div class="row">

                        <!-- NOME -->
                        <div class="col-md-6 mb-2">

                            <label for="nome" class="form-label mb-1">
                                Nome
                            </label>

                            <input type="text" class="form-control" id="nome" name="nome" maxlength="100" required>

                        </div>

                        <!-- CPF -->
                        <div class="col-md-3 mb-2">

                            <label for="cpf" class="form-label mb-1">
                                CPF
                            </label>

                            <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14"
                                placeholder="000.000.000-00" required>

                        </div>

                        <!-- TELEFONE -->
                        <div class="col-md-3 mb-2">

                            <label for="telefone" class="form-label mb-1">
                                Telefone
                            </label>

                            <input type="text" class="form-control" id="telefone" name="telefone" maxlength="15"
                                placeholder="(00) 00000-0000">

                        </div>

                        <!-- E-MAIL -->
                        <div class="col-md-8 mb-2">

                            <label for="email" class="form-label mb-1">
                                E-mail
                            </label>

                            <input type="email" class="form-control" id="email" name="email" maxlength="100" required>

                        </div>

                        <!-- SENHA -->
                        <div class="col-md-4 mb-2">

                            <label for="senha" class="form-label mb-1">
                                Senha
                            </label>

                            <input type="password" class="form-control" id="senha" name="senha" maxlength="255"
                                required>

                        </div>

                    </div>

                    <hr class="my-2">

                    <!-- ENDEREÇO -->
                    <h5 class="mb-2">
                        <i class="bi bi-house"></i>
                        Endereço
                    </h5>

                    <div class="row">

                        <!-- LOGRADOURO -->
                        <div class="col-md-7 mb-2">

                            <label for="logradouro" class="form-label mb-1">
                                Logradouro
                            </label>

                            <input type="text" class="form-control" id="logradouro" name="logradouro" maxlength="45">

                        </div>

                        <!-- NÚMERO -->
                        <div class="col-md-2 mb-2">

                            <label for="numero" class="form-label mb-1">
                                Número
                            </label>

                            <input type="text" class="form-control" id="numero" name="numero" maxlength="10">

                        </div>

                        <!-- CEP -->
                        <div class="col-md-3 mb-2">

                            <label for="cep" class="form-label mb-1">
                                CEP
                            </label>

                            <input type="text" class="form-control" id="cep" name="cep" maxlength="10"
                                placeholder="00000-000">

                        </div>

                        <!-- BAIRRO -->
                        <div class="col-md-5 mb-2">

                            <label for="bairro" class="form-label mb-1">
                                Bairro
                            </label>

                            <input type="text" class="form-control" id="bairro" name="bairro" maxlength="100">

                        </div>

                        <!-- CIDADE -->
                        <div class="col-md-5 mb-2">

                            <label for="cidade" class="form-label mb-1">
                                Cidade
                            </label>

                            <input type="text" class="form-control" id="cidade" name="cidade" maxlength="100">

                        </div>

                        <!-- UF -->
                        <div class="col-md-2 mb-2">

                            <label for="estado" class="form-label mb-1">
                                UF
                            </label>

                            <input type="text" class="form-control" id="estado" name="estado" maxlength="2">

                        </div>

                        <!-- COMPLEMENTO -->
                        <div class="col-md-12 mb-2">

                            <label for="complemento" class="form-label mb-1">
                                Complemento
                            </label>

                            <input type="text" class="form-control" id="complemento" name="complemento" maxlength="100">

                        </div>

                    </div>

                    <!-- BOTÕES -->
                    <div class="d-flex justify-content-between mt-3">

                        <a href="javascript:history.back()" class="btn btn-primary">

                            <i class="bi bi-arrow-left"></i>
                            Voltar

                        </a>

                        <button type="submit" name="salvar" class="btn btn-primary">

                            <i class="bi bi-person-plus"></i>
                            Salvar

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>

</html>