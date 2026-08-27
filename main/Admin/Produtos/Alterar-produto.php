<?php
//1. Conectar no banco de dados (ip, usuário, senha, nome do banco)
$conexao = mysqli_connect('localhost', 'root', '', 'tcc');

//verificar se foi clicado no botão salvar
if (isset($_POST['salvar'])) {

    //2. Preparar os dados para inserir
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $statusproduto = $_POST['statusproduto'];


    //3. Preparar a SQL para inserir
    $sql = "update produto
    set nome = '" . $_POST['nome'] . "',
    descricao = '" . $_POST['descricao'] . "',
    preco = '" . $_POST['preco'] . "',
    statusproduto = '" . $_POST['statusproduto'] . "'
        where id = " . $_GET['id'];

    //4. Executar a SQL
    mysqli_query($conexao, $sql);

    //5. Mostrar mensagem ao usuário
    $mensagem = "Registro salvo com sucesso.";
}


$sql = "select * from produto where id = " . $_GET['id'];
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
                <label for="nome" class="form-label">Nome:</label>
                <input name="nome" type="text" class="form-control" value="<?= $registro['nome'] ?>" id="nome">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <input name="descricao" type="text" class="form-control" value="<?= $registro['descricao'] ?>"
                    id="descricao">
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço:</label>
                <input name="preco" type="text" class="form-control" value="<?= $registro['preco'] ?>" id="preco">
            </div>
            <div class="mb-3">
                <label for="statusproduto" class="form-label">Status:</label>
                <select class="form-select" name="statusproduto" id="statusproduto">
                    <option value="Ativo" <?= ($registro['statusproduto'] == "Ativo") ? "selected" : "" ?>>Ativo</option>
                    <option value="Inativo" <?= ($registro['statusproduto'] == "Inativo") ? "selected" : "" ?>>Inativo</option>
                </select>
            </div>
            <a href="produto-listar.php" class="btn btn-primary">
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