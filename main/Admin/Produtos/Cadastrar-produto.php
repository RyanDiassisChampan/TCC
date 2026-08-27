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

    <main class="container" style="max-width: 750px; margin-top: 50px; margin-bottom: 50px;">

        <div class="card shadow">

            <div class="card-header bg-primary text-white text-center">
                <h3 style="margin: 0;">
                    <i class="bi bi-box-seam"></i>
                    Cadastro de Produto
                </h3>
            </div>

            <div class="card-body">

                <form>

                    <div class="mb-3">
                        <label for="imagem" class="form-label">
                            Imagem
                        </label>

                        <input type="text" class="form-control" id="imagem" name="imagem" maxlength="100"
                            placeholder="Nome ou caminho da imagem">
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
                            placeholder="Digite a descrição do produto"></textarea>
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

                            <label for="desconto" class="form-label">
                                Desconto
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    %
                                </span>

                                <input type="number" class="form-control" id="desconto" name="desconto" step="0.01"
                                    min="0" placeholder="0,00">

                            </div>

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

                                <option value="1">
                                    Processador
                                </option>

                                <option value="2">
                                    Memória RAM
                                </option>

                                <option value="3">
                                    Placa de vídeo
                                </option>

                                <option value="4">
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

                                <option value="1">
                                    AMD
                                </option>

                                <option value="2">
                                    Intel
                                </option>

                                <option value="3">
                                    Corsair
                                </option>

                                <option value="4">
                                    Kingston
                                </option>

                            </select>

                        </div>

                    </div>

                    <div class="mb-4">

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

                    <div class="d-flex justify-content-between">

                        <a href="javascript:history.back()" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Voltar
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i>
                            Cadastrar Produto
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>

</html>