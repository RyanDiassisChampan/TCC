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
    <title>Cadastro de Produto</title>
</head>

<body>
    <?php
    $conexao = mysqli_connect("localhost", "root", "", "tcc");
    if (isset($_POST['cadastrar'])) {
        $imagem = $_POST['imagem'];
        $modelo = $_POST['modelo'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $qntdEstoque = $_POST['qntdEstoque'];
        $tipo = $_POST['tipo'];
        $marca = $_POST['marca'];
        $sql = "insert into tbProduto (Imagem, Modelo, Descricao, Valor, Qntd_Estoque, Tipo, Marca, Status) VALUES ('$imagem', '$modelo', '$descricao', '$valor', '$qntdEstoque', '$tipo', '$marca', 'Ativo')";
        mysqli_query($conexao, $sql);
        ?>

        <div class="alert alert-success alert-dismissible fade show 
            position-fixed top-0 start-50 translate-middle-x 
            mt-3 shadow text-center" style="width: 90%; max-width: 500px; z-index: 1050;" role="alert">

            <i class="bi bi-check-circle-fill me-2"></i>
            <strong>Sucesso!</strong> Registro salvo com sucesso!

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>

        <?php
    }

    ?>

    <form method="POST">
        <main class="container" style="max-width: 750px; margin-top: 50px; margin-bottom: 50px;">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h3 style="margin: 0;">
                        <i class="bi bi-box-seam"></i>
                        Cadastro de Produto
                    </h3>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <label for="imagem" class="form-label">
                            Imagem
                        </label>

                        <input type="text" class="form-control" id="imagem" name="imagem" maxlength="100"
                            placeholder="Nome ou caminho da imagem" required>
                    </div>

                    <div class="mb-3">
                        <label for="modelo" class="form-label">
                            Modelo
                        </label>

                        <input type="text" class="form-control" id="modelo" name="modelo" maxlength="100"
                            placeholder="Digite o modelo" required>
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">
                            Descrição
                        </label>

                        <textarea class="form-control" id="descricao" name="descricao" rows="4" maxlength="350"
                            placeholder="Digite a descrição do produto" required></textarea>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="valor" class="form-label">
                                Valor
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    R$
                                </span>

                                <input type="number" class="form-control" id="valor" name="valor" step="0.01" min="0"
                                    placeholder="0,00" required>

                            </div>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label for="qntdEstoque" class="form-label">
                                Quantidade no Estoque:
                            </label>

                            <input type="number" class="form-control" id="qntdEstoque" name="qntdEstoque" step="1"
                                min="1" placeholder="0" required>
                        </div>

                    </div>

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


                    <div class="d-flex justify-content-between">

                        <a href="../Cadastros.php" class="btn btn-primary">

                            <i class="bi bi-arrow-left"></i>
                            Voltar

                        </a>

                        <button type="submit" class="btn btn-primary" name="cadastrar">
                            <i class="bi bi-plus-lg"></i>
                            Cadastrar Produto
                        </button>

                    </div>

                </div>

            </div>

        </main>
    </form>

</body>

</html>