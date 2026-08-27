<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - LabMaker</title>
</head>

<body style="min-height: 100vh; display: flex; flex-direction: column;">
  <main style="flex: 1;">
    <h1 style="text-align: center; margin-top: 50px; margin-bottom: 50px">Login de Usuário</h1>

    <form class="container p-4"
      style="border-style: solid; border-width: 2px; border-color: black; border-radius: 10px; max-width: 500px;">

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email">
      </div>
      <div class="mb-3">
        <label for="senha" class="form-label">Senha </label>
        <input type="password" class="form-control" id="senha">
        <a href="RedefinirSenha.php" style="text-align: center;">Esqueci a senha</a>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Lembre-se de mim</label>
      </div>
      <a href="Main.php" class="btn btn-primary">Entrar</a>
      <br>
      <br>
      <p>Não possui uma conta? <a href="Cadastrar.php" style="text-align: center;">Cadastre-se</a></p>
    </form>
  </main>

  <footer class="footer py-3">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Início</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Conteúdo</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Sobre</a></li>
    </ul>
    <p class="text-center text-body-secondary">© 2026 LabMaker, Inc</p>
  </footer>

</body>

</html>