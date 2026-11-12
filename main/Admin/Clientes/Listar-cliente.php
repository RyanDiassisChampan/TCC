<?php

//1. Conectar no banco de dados (ip, usuário, senha, nome do banco)

$conexao = mysqli_connect('localhost', 'root', '', 'tcc');

if (isset($_GET['Codigo'])) {

    $sql = "delete from tbCliente where Codigo = " . $_GET['Codigo'];

    mysqli_query($conexao, $sql);

    $mensagem = "Registro excluído com sucesso.";

}

//2. Prepara o SQL

$sql = "select * from tbCliente";

//3. Executar a SQL

$resultado = mysqli_query($conexao, $sql);

//5. Mostrar mensagem ao usuário

$mensagem = "Registro exclído com sucesso.";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>LabMaker</title>

    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">

    <?php include_once __DIR__ . '/../../../includes/navbar_funcionario.php'; ?>

    <div class="container">

        <?php if (isset($_GET['codigo'])) { ?>

            <div class="alert alert-success" role="alert">

                <i class="bi bi-check-circle"></i>

                <?= $mensagem ?>

            </div>

        <?php } ?>

        <div class="card mt-3 mb-3">

            <div class="card-body">

                <h5 class="card-title">

                    <i class="bi bi-card-list"></i> Listagem de Clientes

                </h5>

            </div>

        </div>

        <table class="table">

            <thead>

                <tr>

                    <th scope="col">Código</th>

                    <th scope="col">Nome</th>

                    <th scope="col">CPF</th>

                    <th scope="col">Telefone</th>

                    <th scope="col">Email</th>

                    <th scope="col">Status</th>

                    <th scope="col">Ações</th>

                </tr>

            </thead>

            <tbody>

                <?php while ($linha = mysqli_fetch_array($resultado)) { ?>

                    <tr>

                        <th><?= $linha['Codigo'] ?></th>

                        <td><?= $linha['Nome'] ?></td>

                        <td><?= $linha['CPF'] ?></td>

                        <td><?= $linha['Telefone'] ?></td>

                        <td><?= $linha['Email'] ?></td>

                        <td><?= $linha['Status'] ?></td>

                        <td>

                            <a class="btn btn-warning" href="Alterar-cliente.php?Codigo=<?= $linha['Codigo'] ?>">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <a class="btn btn-danger" href="Listar-cliente.php?Codigo=<?= $linha['Codigo'] ?>"
                                onclick="return confirm('Deseja excluir este registro?')">

                                <i class="bi bi-trash"></i>

                            </a>

                        </td>

                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</body>

</html>