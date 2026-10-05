<?php
//1. Conectar no banco de dados (ip, usuário, senha, nome do banco)
$conexao = mysqli_connect('localhost', 'root', '', 'tcc');

//verificar se foi clicado no botão salvar
if (isset($_POST['salvar'])) {

    //2. Preparar os dados para inserir
    $modelo = $_POST['modelo'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $qntdEstoque = $_POST['qntdEstoque'];
    $status = $_POST['Status'];


    //3. Preparar a SQL para inserir
    $sql = "update tbproduto
        set Modelo = '$modelo',
            Descricao = '$descricao',
            Valor = '$valor',
            Qntd_Estoque = '$qntdEstoque',
            Status = '$status'
        where Codigo = " . $_GET['Codigo'];

    //4. Executar a SQL
    mysqli_query($conexao, $sql);

    //5. Mostrar mensagem ao usuário
    $mensagem = "Registro salvo com sucesso.";
}


$sql = "select * from tbproduto where Codigo = " . $_GET['Codigo'];
$resultado = mysqli_query($conexao, $sql);
$registro = mysqli_fetch_array($resultado);
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <h5 class="card-title"></i> Alteração de Produto</h5>
            </div>
        </div>
        <form method="post">
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo:</label>
                <input name="modelo" type="text" class="form-control" value="<?= $registro['Modelo'] ?>" id="modelo">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <input name="descricao" type="text" class="form-control" value="<?= $registro['Descricao'] ?>"
                    id="descricao">
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input name="valor" type="text" class="form-control" value="<?= $registro['Valor'] ?>" id="valor">
            </div>
            <div class="mb-3">
                <label for="qntdEstoque" class="form-label">Quantidade em Estoque:</label>
                <input name="qntdEstoque" type="text" class="form-control" value="<?= $registro['Qntd_Estoque'] ?>" id="qntdEstoque">
            </div>
            <div class="mb-3">
                <label for="Status" class="form-label">Status:</label>
                <select class="form-select" name="Status" id="Status">
                    <option value="Ativo" <?= ($registro['Status'] == "Ativo") ? "selected" : "" ?>>Ativo</option>
                    <option value="Inativo" <?= ($registro['Status'] == "Inativo") ? "selected" : "" ?>>Inativo</option>
                </select>
            </div>
            <a href="Listar-produto.php" class="btn btn-primary">
                <i class="bi bi-arrow-return-left"></i>Voltar</a>
            <button name="salvar" type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Salvar</button>
            <br>
            <br>
            <?php if (isset($_POST['salvar'])) { ?>
                <div class="alert alert-success" role="alert">
                    <i class="bi bi-check-circle"></i> <?= $mensagem ?>
                </div>
            <?php } ?>
        </form>
    </div>
</body>

</html>