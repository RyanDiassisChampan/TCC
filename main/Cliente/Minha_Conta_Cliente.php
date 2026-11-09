<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (empty($_SESSION['id']) || ($_SESSION['tipo'] ?? '') !== 'cliente') {
    header("Location: Login.php");
    exit;
}
$connConta = mysqli_connect("localhost", "root", "", "tcc");
$dadosConta = [];
if ($connConta) {
    mysqli_set_charset($connConta, "utf8mb4");
    $idConta = (int) $_SESSION['id'];
    $stmtConta = mysqli_prepare($connConta, "SELECT Nome, CPF, Email, Telefone, CEP, Logradouro, Numero, Cidade, Estado FROM tbCliente WHERE Codigo = ? LIMIT 1");
    mysqli_stmt_bind_param($stmtConta, "i", $idConta);
    mysqli_stmt_execute($stmtConta);
    $dadosConta = mysqli_fetch_assoc(mysqli_stmt_get_result($stmtConta)) ?: [];
    mysqli_stmt_close($stmtConta);
    if (!empty($dadosConta['Nome'])) { $_SESSION['nome'] = $dadosConta['Nome']; }
}
function valorContaCliente($campo) {
    global $dadosConta;
    return htmlspecialchars((string)($dadosConta[$campo] ?? ''), ENT_QUOTES, 'UTF-8');
}
include "../../includes/header.php";
?>

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
                            Olá, <?php echo htmlspecialchars($_SESSION['nome'] ?? ($dadosConta['Nome'] ?? 'Cliente'), ENT_QUOTES, 'UTF-8'); ?>!
                        </h5>

                        <div class="list-group">

                            <a href="Minha_Conta_Cliente.php#meus-dados" class="list-group-item list-group-item-action active">
                                <i class="bi bi-person me-2"></i>
                                Meus Dados
                            </a>

                            <a href="Meus_Pedidos.php" class="list-group-item list-group-item-action">
                                <i class="bi bi-bag me-2"></i>
                                Meus Pedidos
                            </a>
                            <a href="Logout.php" class="list-group-item list-group-item-action text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Sair
                            </a>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Dados da conta -->
            <div class="col-md-9" id="meus-dados">

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

                                <input type="text" name="nome" class="form-control" placeholder="Nome completo" maxlength="100" value="<?php echo valorContaCliente('Nome'); ?>">
                            </div>

                            <!-- CPF -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    CPF
                                </label>

                                <input type="text" name="cpf" class="form-control" placeholder="000.000.000-00" maxlength="14" value="<?php echo valorContaCliente('CPF'); ?>">
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    E-mail
                                </label>

                                <input type="email" name="email" class="form-control" placeholder="email@exemplo.com" maxlength="100" value="<?php echo valorContaCliente('Email'); ?>">
                            </div>

                            <!-- Telefone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">
                                    Telefone
                                </label>

                                <input type="text" name="telefone" class="form-control" placeholder="(44) 99999-9999" maxlength="15" value="<?php echo valorContaCliente('Telefone'); ?>">
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

                                <input type="text" name="cep" class="form-control" placeholder="00000-000" maxlength="9" value="<?php echo valorContaCliente('CEP'); ?>">
                            </div>

                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-bold">
                                    Endereço
                                </label>

                                <input type="text" name="logradouro" class="form-control" placeholder="Rua Exemplo" maxlength="45" value="<?php echo valorContaCliente('Logradouro'); ?>">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    Número
                                </label>

                                <input type="text" name="numero" class="form-control" placeholder="Número" maxlength="10" value="<?php echo valorContaCliente('Numero'); ?>">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    Cidade
                                </label>

                                <input type="text" name="cidade" class="form-control" placeholder="Cidade" maxlength="100" value="<?php echo valorContaCliente('Cidade'); ?>">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">
                                    Estado
                                </label>

                                <input type="text" name="estado" class="form-control" placeholder="PR" maxlength="2" value="<?php echo valorContaCliente('Estado'); ?>">
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