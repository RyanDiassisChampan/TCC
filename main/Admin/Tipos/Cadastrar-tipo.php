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
    <title>Cadastro de Tipo</title>
</head>

<body>

    <main class="container" style="max-width: 600px; margin-top: 80px;">

        <div class="card shadow">

            <div class="card-header bg-primary text-white text-center">
                <h3 style="margin: 0;">
                    <i class="bi bi-tags"></i>
                    Cadastro de Tipo
                </h3>
            </div>

            <div class="card-body">

                <form>

                    <div class="mb-4">
                        <label for="nome" class="form-label">
                            Nome do Tipo
                        </label>

                        <input type="text" class="form-control" id="nome" name="nome" maxlength="100"
                            placeholder="Digite o nome do tipo" required>
                    </div>

                    <div class="d-flex justify-content-between">

                        <a href="javascript:history.back()" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Voltar
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i>
                            Cadastrar
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>

</html>