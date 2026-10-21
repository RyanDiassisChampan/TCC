<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// A navbar é reutilizada em várias páginas; evita variável indefinida.
$busca = trim($_GET['busca'] ?? '');

$clienteConectado = !empty($_SESSION['id']) && (($_SESSION['tipo'] ?? '') === 'cliente');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <title>LabMaker</title>

  <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

  <!-- Navbar -->
  <?php include_once __DIR__ . '/navbar_cliente.php'; ?>