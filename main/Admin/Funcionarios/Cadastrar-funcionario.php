<?php
require_once "../../../includes/validacoes.php";

$erros = [];
$mensagem = "";

if (isset($_POST['salvar'])) {
    $conexao = mysqli_connect('localhost', 'root', '', 'tcc');

    if (!$conexao) {
        $erros[] = "Não foi possível conectar ao banco de dados.";
    } else {
        $nome = valorPost('nome');
        $cpf = valorPost('cpf');
        $telefone = valorPost('telefone');
        $email = valorPost('email');
        $senha = $_POST['senha'] ?? '';
        $logradouro = valorPost('logradouro');
        $numero = valorPost('numero');
        $bairro = valorPost('bairro');
        $cidade = valorPost('cidade');
        $complemento = valorPost('complemento');
        $cep = valorPost('cep');
        $estado = strtoupper(valorPost('estado'));

        if (!validarNome($nome)) $erros[] = "O nome deve conter apenas letras, espaços e ter pelo menos 3 caracteres.";
        if (!validarCPF($cpf)) $erros[] = "Digite um CPF válido.";
        if ($telefone !== '' && !validarTelefone($telefone)) $erros[] = "Digite um telefone válido.";
        if (!validarEmail($email)) $erros[] = "Digite um e-mail válido.";
        if (!validarSenha($senha)) $erros[] = "A senha deve possuir pelo menos 6 caracteres.";
        if (!validarLogradouro($logradouro, 45)) $erros[] = "O logradouro contém caracteres inválidos ou ultrapassa 45 caracteres.";
        if (!validarNumeroEndereco($numero)) $erros[] = "O número do endereço contém caracteres inválidos.";
        if (!validarTextoSemNumeros($bairro, 100)) $erros[] = "O bairro deve conter apenas letras, espaços, hífen e apóstrofo.";
        if (!validarTextoSemNumeros($cidade, 100)) $erros[] = "A cidade deve conter apenas letras, espaços, hífen e apóstrofo.";
        if (!validarComplemento($complemento, 100)) $erros[] = "O complemento contém caracteres inválidos ou ultrapassa 100 caracteres.";
        if (!validarCEP($cep)) $erros[] = "Digite um CEP válido no formato 00000-000.";
        if (!validarUF($estado)) $erros[] = "Digite uma UF válida com 2 letras.";

        if (empty($erros)) {
            $verificar = mysqli_prepare($conexao, "SELECT Codigo FROM tbfuncionario WHERE CPF = ?");
            mysqli_stmt_bind_param($verificar, "s", $cpf);
            mysqli_stmt_execute($verificar);
            mysqli_stmt_store_result($verificar);
            if (mysqli_stmt_num_rows($verificar) > 0) $erros[] = "Este CPF já está cadastrado.";
            mysqli_stmt_close($verificar);
        }

        if (empty($erros)) {
            $sql = "INSERT INTO tbfuncionario
                    (nome, cpf, telefone, email, senha, logradouro, numero, bairro, cidade, complemento, cep, estado)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conexao, $sql);
            mysqli_stmt_bind_param(
                $stmt, "ssssssssssss",
                $nome, $cpf, $telefone, $email, $senha,
                $logradouro, $numero, $bairro, $cidade,
                $complemento, $cep, $estado
            );

            if (mysqli_stmt_execute($stmt)) {
                $mensagem = "Registro salvo com sucesso.";
            } else {
                $erros[] = "Não foi possível salvar o registro.";
            }
            mysqli_stmt_close($stmt);
        }

        mysqli_close($conexao);
    }
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

    <link rel="stylesheet" href="../style.css">
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

                <?php if (!empty($erros)) { ?>
                    <div class="alert alert-danger">
                        <strong>Verifique os dados:</strong>
                        <ul class="mb-0 mt-2">
                            <?php foreach ($erros as $erro) { ?>
                                <li><?php echo htmlspecialchars($erro); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                <?php if ($mensagem !== '') { ?>
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle"></i>
                        <?php echo htmlspecialchars($mensagem); ?>
                    </div>
                <?php } ?>

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

                            <input type="text" class="form-control" id="nome" name="nome" maxlength="100" minlength="3" pattern="[A-Za-zÀ-ÿ\s'-]+" required>

                        </div>

                        <!-- CPF -->
                        <div class="col-md-3 mb-2">

                            <label for="cpf" class="form-label mb-1">
                                CPF
                            </label>

                            <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" minlength="14" inputmode="numeric"
                                placeholder="000.000.000-00" required>

                        </div>

                        <!-- TELEFONE -->
                        <div class="col-md-3 mb-2">

                            <label for="telefone" class="form-label mb-1">
                                Telefone
                            </label>

                            <input type="text" class="form-control" id="telefone" name="telefone" maxlength="15" inputmode="tel"
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

                            <input type="password" class="form-control" id="senha" name="senha" maxlength="255" minlength="6"
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

                            <input type="text" class="form-control" id="numero" name="numero" maxlength="10" pattern="[0-9A-Za-z\s/\-]+">

                        </div>

                        <!-- CEP -->
                        <div class="col-md-3 mb-2">

                            <label for="cep" class="form-label mb-1">
                                CEP
                            </label>

                            <input type="text" class="form-control" id="cep" name="cep" maxlength="9" minlength="9" inputmode="numeric"
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

                            <input type="text" class="form-control" id="estado" name="estado" maxlength="2" minlength="2" pattern="[A-Za-z]{2}">

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

<script src="../../../includes/validacoes.js"></script>
</body>

</html>