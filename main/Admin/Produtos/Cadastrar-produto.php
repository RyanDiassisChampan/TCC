<?php
require_once "../../../includes/validacoes.php";


$conexao = mysqli_connect("localhost", "root", "", "tcc");

$erros = [];
$mensagem = "";

if (!$conexao) {
    $erros[] = "Erro na conexão com o banco de dados.";
}

if (isset($_POST['cadastrar']) && empty($erros)) {

    $modelo = trim($_POST['modelo'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $valor = $_POST['valor'] ?? '';
    $qntdEstoque = $_POST['qntdEstoque'] ?? '';
    $tipo = trim($_POST['tipo'] ?? '');
    $marca = trim($_POST['marca'] ?? '');

    if (!validarProdutoModelo($modelo)) {
        $erros[] = "Informe um modelo válido com até 100 caracteres.";
    }

    if (!validarProdutoDescricao($descricao)) {
        $erros[] = "Informe uma descrição com até 350 caracteres.";
    }

    if (!validarValorProduto($valor)) {
        $erros[] = "O valor deve ser maior que R$ 0,00.";
    }

    if (!validarEstoque($qntdEstoque)) {
        $erros[] = "A quantidade em estoque deve ser um número inteiro maior ou igual a zero.";
    }

    if ($tipo === '') {
        $erros[] = "Selecione o tipo do produto.";
    }

    if (!validarProdutoMarca($marca)) {
        $erros[] = "Informe uma marca válida.";
    }

    if (!isset($_FILES['imagem']) || $_FILES['imagem']['error'] !== UPLOAD_ERR_OK) {
        $erros[] = "Selecione uma imagem válida.";
    } else {

        $arquivo = $_FILES['imagem'];

        if ($arquivo['size'] > 5 * 1024 * 1024) {
            $erros[] = "A imagem não pode ter mais de 5 MB.";
        }

        $tiposPermitidos = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        $tipoImagem = mime_content_type($arquivo['tmp_name']);

        if (!in_array($tipoImagem, $tiposPermitidos, true)) {
            $erros[] = "A imagem deve estar no formato JPG, PNG ou WEBP.";
        }
    }

    if (empty($erros)) {

        $nomeOriginal = basename($_FILES['imagem']['name']);
        $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

        $nomeImagem = uniqid('produto_', true) . '.' . $extensao;

        $pasta = "../../../imagens/";
        $caminhoImagem = $pasta . $nomeImagem;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem)) {

            $sql = "INSERT INTO tbProduto
                    (Imagem, Modelo, Descricao, Valor, Qntd_Estoque, Tipo, Marca, Status)
                    VALUES (?, ?, ?, ?, ?, ?, ?, 'Ativo')";

            $stmt = mysqli_prepare($conexao, $sql);

            mysqli_stmt_bind_param(
                $stmt,
                "sssdiss",
                $nomeImagem,
                $modelo,
                $descricao,
                $valor,
                $qntdEstoque,
                $tipo,
                $marca
            );

            if (mysqli_stmt_execute($stmt)) {
                $mensagem = "Registro salvo com sucesso.";
            } else {
                $erros[] = "Erro ao cadastrar o produto.";
                if (file_exists($caminhoImagem)) {
                    unlink($caminhoImagem);
                }
            }

            mysqli_stmt_close($stmt);

        } else {
            $erros[] = "Não foi possível enviar a imagem.";
        }
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
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYjWrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <title>Cadastro de Produto</title>


    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <form method="POST" enctype="multipart/form-data">

        <main class="container" style="max-width: 750px; margin-top: 50px; margin-bottom: 50px;">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">

                    <h3 style="margin: 0;">

                        <i class="bi bi-box-seam"></i>

                        Cadastro de Produto

                    </h3>

                </div>

                <div class="card-body">

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
                            <i class="bi bi-check-circle-fill me-2"></i>
                            <?php echo htmlspecialchars($mensagem); ?>
                        </div>
                    <?php } ?>

                    <!-- IMAGEM -->

                    <div class="mb-3">

                        <label for="imagem" class="form-label">
                            Imagem
                        </label>

                        <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*" required>

                    </div>


                    <!-- MODELO -->

                    <div class="mb-3">

                        <label for="modelo" class="form-label">
                            Modelo
                        </label>

                        <input type="text" class="form-control" id="modelo" name="modelo" maxlength="100"
                            placeholder="Digite o modelo" required>

                    </div>


                    <!-- DESCRIÇÃO -->

                    <div class="mb-3">

                        <label for="descricao" class="form-label">
                            Descrição
                        </label>

                        <textarea class="form-control" id="descricao" name="descricao" rows="4" maxlength="350"
                            placeholder="Digite a descrição do produto" required></textarea>

                    </div>


                    <!-- VALOR E ESTOQUE -->

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="valor" class="form-label">
                                Valor
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    R$
                                </span>

                                <input type="number" class="form-control" id="valor" name="valor" step="0.01" min="0.01"
                                    placeholder="0,00" required>

                            </div>

                        </div>


                        <div class="col-md-6 mb-3">

                            <label for="qntdEstoque" class="form-label">
                                Quantidade no Estoque:
                            </label>

                            <input type="number" class="form-control" id="qntdEstoque" name="qntdEstoque" step="1"
                                min="0" placeholder="0" required>

                        </div>

                    </div>


                    <!-- TIPO E MARCA -->

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="tipo" class="form-label">
                                Tipo
                            </label>

                            <select class="form-select" id="tipo" name="tipo" required>

                                <option value="">
                                    Selecione o tipo
                                </option>

                                <option value="Processador">
                                    Processador
                                </option>

                                <option value="Memória RAM">
                                    Memória RAM
                                </option>

                                <option value="Placa de vídeo">
                                    Placa de vídeo
                                </option>

                                <option value="SSD">
                                    SSD
                                </option>

                            </select>

                        </div>


                        <div class="col-md-6 mb-3">

                            <label for="marca" class="form-label">
                                Marca
                            </label>

                            <select class="form-select" id="marca" name="marca" required>

                                <option value="">
                                    Selecione a marca
                                </option>

                                <option value="AMD">
                                    AMD
                                </option>

                                <option value="Intel">
                                    Intel
                                </option>

                                <option value="Corsair">
                                    Corsair
                                </option>

                                <option value="Kingston">
                                    Kingston
                                </option>

                            </select>

                        </div>

                    </div>


                    <!-- BOTÕES -->

                    <div class="d-flex justify-content-between">

                        <a href="../Cadastros.php" class="btn btn-primary">

                            <i class="bi bi-arrow-left"></i>

                            Voltar

                        </a>


                        <button type="submit" class="btn btn-primary" name="cadastrar">

                            Salvar

                        </button>

                    </div>

                </div>

            </div>

        </main>

    </form>

<script src="../../../includes/validacoes.js"></script>
</body>

</html>