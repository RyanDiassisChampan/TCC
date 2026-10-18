<?php
session_start();
$erro = "";
if (!empty($_SESSION['id']) && ($_SESSION['tipo'] ?? '') === 'cliente') {
  header("Location: index.php");
  exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $senha = $_POST['senha'] ?? '';
  $conn = mysqli_connect("localhost", "root", "", "tcc");
  if (!$conn) {
    $erro = "Não foi possível conectar ao banco de dados.";
  } else {
    mysqli_set_charset($conn, "utf8mb4");
    $stmt = mysqli_prepare($conn, "SELECT Codigo, Nome, Email, Senha, Status FROM tbCliente WHERE Email = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $cliente = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    mysqli_stmt_close($stmt);
    if (
      $cliente && (!isset($cliente['Status']) || $cliente['Status'] === '' || strcasecmp($cliente['Status'], 'Ativo') === 0)
      && (password_verify($senha, $cliente['Senha']) || hash_equals((string) $cliente['Senha'], (string) $senha))
    ) {
      session_regenerate_id(true);
      $_SESSION['id'] = (int) $cliente['Codigo'];
      $_SESSION['tipo'] = 'cliente';
      $_SESSION['nome'] = $cliente['Nome'];
      $retorno = $_GET['retorno'] ?? '';
      if ($retorno === 'Carrinho.php') {
        header("Location: Carrinho.php");
      } else {
        header("Location: index.php");
      }
      exit;
    }
    $erro = "E-mail ou senha inválidos. Verifique seus dados e tente novamente.";
    mysqli_close($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - LabMaker</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .login-navbar {
      border-bottom: 3px solid var(--lm-azul, #0866f5);
    }

    .login-navbar .navbar-brand {
      letter-spacing: .2px;
      line-height: 1.1;
    }

    .login-navbar-logo {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 42px;
      height: 42px;
      border-radius: 10px;
      background: rgba(255, 255, 255, .12);
      font-size: 1.45rem;
    }

    .login-navbar-subtitle {
      margin-top: 3px;
      color: rgba(255, 255, 255, .7);
      font-size: .68rem;
      font-weight: 400;
      letter-spacing: .35px;
    }

    .login-nav-link {
      color: rgba(255, 255, 255, .9) !important;
      padding: .6rem .85rem !important;
      border-radius: .5rem;
    }

    .login-nav-link:hover,
    .login-nav-link:focus {
      color: #fff !important;
      background: rgba(255, 255, 255, .1);
    }

    .login-nav-button {
      color: #06243a !important;
      border: 0;
      border-radius: .5rem;
      padding: .55rem 1rem;
      font-weight: 600;
    }

    .login-nav-button:hover {
      background: #e8edf2 !important;
    }

    @media (max-width: 991.98px) {
      .login-navbar .navbar-collapse {
        border-top: 1px solid rgba(255, 255, 255, .15);
        margin-top: .75rem;
      }

      .login-nav-button {
        display: inline-block;
        align-self: flex-start;
      }
    }
  </style>
</head>

<body class="bg-light d-flex flex-column min-vh-100">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <?php
  include "../../includes/header.php";
  ?>
  <main class="container flex-grow-1 d-flex align-items-center justify-content-center py-5">
    <div class="card border-0 shadow-sm w-100" style="max-width:480px">
      <div class="card-body p-4 p-md-5">
        <div class="text-center mb-4"><i class="bi bi-person-circle display-4 text-primary"></i>
          <h1 class="h3 fw-bold mt-3">Entrar na sua conta</h1>
          <p class="text-secondary">Acesse sua conta para continuar comprando.</p>
        </div>
        <?php if ($erro !== '') { ?>
          <div class="alert alert-danger"><?php echo htmlspecialchars($erro, ENT_QUOTES, 'UTF-8'); ?></div><?php } ?>
        <form method="POST"
          action="Login.php<?php echo isset($_GET['retorno']) && $_GET['retorno'] === 'Carrinho.php' ? '?retorno=Carrinho.php' : ''; ?>">
          <div class="mb-3"><label for="email" class="form-label">E-mail</label><input type="email" name="email"
              id="email" class="form-control" autocomplete="email" required
              value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"></div>
          <div class="mb-3"><label for="senha" class="form-label">Senha</label><input type="password" name="senha"
              id="senha" class="form-control" autocomplete="current-password" required></div>
          <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
        <p class="text-center mt-4 mb-0">Não possui uma conta? <a href="Cadastrar.php">Cadastre-se</a></p>
      </div>
    </div>
  </main>
  <footer class="text-center text-secondary py-3">© 2026 LabMaker</footer>
</body>

</html>