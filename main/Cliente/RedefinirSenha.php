<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <title>Redefinir Senha - LabMaker</title>

</head>

<body class="bg-light">


    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow border-0">

                    <div class="card-header bg-primary text-white text-center">

                        <h3>
                            <i class="bi bi-key-fill"></i>
                            Redefinir Senha
                        </h3>

                    </div>


                    <div class="card-body">


                        <form method="post">


                            <div class="mb-3">

                                <label class="form-label">
                                    Nova Senha
                                </label>


                                <div class="input-group">

                                    <input type="password" class="form-control" id="novaSenha" name="novasenha"
                                        placeholder="Digite sua nova senha" required>


                                    <button class="btn btn-outline-secondary" type="button"
                                        onclick="mostrarSenha('novaSenha')">

                                        <i class="bi bi-eye"></i>

                                    </button>


                                </div>


                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Confirmar Nova Senha
                                </label>


                                <div class="input-group">

                                    <input type="password" class="form-control" id="confirmarSenha"
                                        name="confirmarsenha" placeholder="Confirme sua senha" required>


                                    <button class="btn btn-outline-secondary" type="button"
                                        onclick="mostrarSenha('confirmarSenha')">

                                        <i class="bi bi-eye"></i>

                                    </button>

                                </div>

                            </div>



                            <div class="alert alert-info">

                                <strong>A senha deve conter:</strong>

                                <ul class="mb-0">

                                    <li>Mínimo de 8 caracteres</li>

                                    <li>Pelo menos uma letra maiúscula</li>

                                    <li>Pelo menos um número</li>

                                </ul>

                            </div>



                            <div class="d-flex justify-content-between mt-4">


                                <button type="button" class="btn btn-secondary" onclick="history.back()">

                                    <i class="bi bi-arrow-left"></i>
                                    Voltar

                                </button>



                                <button type="submit" class="btn btn-success">

                                    <i class="bi bi-check-circle"></i>
                                    Salvar

                                </button>


                            </div>


                        </form>


                    </div>

                </div>

            </div>

        </div>

    </div>



    <script>

        function mostrarSenha(id) {

            let campo = document.getElementById(id);

            if (campo.type === "password") {

                campo.type = "text";

            } else {

                campo.type = "password";

            }

        }

    </script>


</body>

</html>