<?php
session_start();

if (empty($_SESSION['id']) || ($_SESSION['tipo'] ?? '') !== 'cliente') {
    header("Location: Login.php?retorno=Carrinho.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "tcc");
if (!$conn) {
    die("Não foi possível conectar ao banco de dados.");
}
mysqli_set_charset($conn, "utf8mb4");

/* Estrutura do carrinho: cada cliente possui um carrinho ativo. */
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS tbCarrinho (
    idCarrinho INT AUTO_INCREMENT PRIMARY KEY,
    idCliente INT NOT NULL UNIQUE,
    dataCriacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB");

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS tbItemCarrinho (
    idItem INT AUTO_INCREMENT PRIMARY KEY,
    idCarrinho INT NOT NULL,
    idProduto INT NOT NULL,
    quantidade INT NOT NULL DEFAULT 1,
    UNIQUE KEY item_unico (idCarrinho, idProduto),
    FOREIGN KEY (idCarrinho) REFERENCES tbCarrinho(idCarrinho) ON DELETE CASCADE,
    FOREIGN KEY (idProduto) REFERENCES tbProduto(Codigo) ON DELETE CASCADE
) ENGINE=InnoDB");

$idCliente = (int) $_SESSION['id'];
$stmt = mysqli_prepare($conn, "INSERT IGNORE INTO tbCarrinho (idCliente) VALUES (?)");
mysqli_stmt_bind_param($stmt, "i", $idCliente);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

$stmt = mysqli_prepare($conn, "SELECT idCarrinho FROM tbCarrinho WHERE idCliente = ?");
mysqli_stmt_bind_param($stmt, "i", $idCliente);
mysqli_stmt_execute($stmt);
$carrinho = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
mysqli_stmt_close($stmt);
$idCarrinho = (int) $carrinho['idCarrinho'];

$mensagem = "";
$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';

    if ($acao === 'adicionar') {
        $idProduto = filter_input(INPUT_POST, 'idProduto', FILTER_VALIDATE_INT);
        $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);
        $quantidade = max(1, (int) $quantidade);

        $stmt = mysqli_prepare($conn, "SELECT Qntd_Estoque FROM tbProduto WHERE Codigo = ? AND Status = 'Ativo'");
        mysqli_stmt_bind_param($stmt, "i", $idProduto);
        mysqli_stmt_execute($stmt);
        $produto = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
        mysqli_stmt_close($stmt);

        if (!$produto) {
            $erro = "Produto não encontrado ou indisponível.";
        } elseif ($quantidade > (int)$produto['Qntd_Estoque']) {
            $erro = "A quantidade solicitada ultrapassa o estoque disponível.";
        } else {
            $stmt = mysqli_prepare($conn, "INSERT INTO tbItemCarrinho (idCarrinho, idProduto, quantidade)
                VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantidade = LEAST(quantidade + VALUES(quantidade), ?)");
            $estoque = (int)$produto['Qntd_Estoque'];
            mysqli_stmt_bind_param($stmt, "iiii", $idCarrinho, $idProduto, $quantidade, $estoque);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("Location: Carrinho.php?adicionado=1");
            exit;
        }
    } elseif ($acao === 'atualizar') {
        foreach (($_POST['quantidades'] ?? []) as $itemId => $qtd) {
            $itemId = (int)$itemId;
            $qtd = max(1, (int)$qtd);
            $stmt = mysqli_prepare($conn, "UPDATE tbItemCarrinho i
                INNER JOIN tbProduto p ON p.Codigo = i.idProduto
                SET i.quantidade = LEAST(?, p.Qntd_Estoque)
                WHERE i.idItem = ? AND i.idCarrinho = ? AND p.Status = 'Ativo'");
            mysqli_stmt_bind_param($stmt, "iii", $qtd, $itemId, $idCarrinho);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        header("Location: Carrinho.php?atualizado=1");
        exit;
    } elseif ($acao === 'remover') {
        $itemId = (int)($_POST['idItem'] ?? 0);
        $stmt = mysqli_prepare($conn, "DELETE FROM tbItemCarrinho WHERE idItem = ? AND idCarrinho = ?");
        mysqli_stmt_bind_param($stmt, "ii", $itemId, $idCarrinho);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: Carrinho.php?removido=1");
        exit;
    }
}

$sql = "SELECT i.idItem, i.quantidade, p.Codigo, p.Modelo, p.Imagem, p.Valor, p.Qntd_Estoque,
        (i.quantidade * p.Valor) AS subtotal
        FROM tbItemCarrinho i
        INNER JOIN tbProduto p ON p.Codigo = i.idProduto
        WHERE i.idCarrinho = ? AND p.Status = 'Ativo'
        ORDER BY i.idItem DESC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $idCarrinho);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$itens = [];
$total = 0;
while ($item = mysqli_fetch_assoc($resultado)) {
    $itens[] = $item;
    $total += (float)$item['subtotal'];
}
mysqli_stmt_close($stmt);
function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Carrinho - LabMaker</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="style.css">
<style>
body { background:#f5f6f8; }
.carrinho-item { display:grid; grid-template-columns:100px minmax(0,1fr) 100px 125px 38px; gap:16px; align-items:center; padding:18px; border-bottom:1px solid #e9ecef; }
.carrinho-item:last-child { border-bottom:0; }
.carrinho-imagem { width:100px;height:90px;object-fit:contain;background:#fff;border:1px solid #edf0f2;border-radius:8px;padding:8px; }
.carrinho-nome { font-weight:600; line-height:1.35; margin-bottom:6px; }
.carrinho-valor { white-space:nowrap; font-weight:600; }
.carrinho-qtd { width:90px; }
.resumo-card { position:sticky;top:20px; }
@media(max-width:767.98px) {
 .carrinho-item { grid-template-columns:76px minmax(0,1fr) 34px; gap:12px; }
 .carrinho-imagem { width:76px;height:76px;grid-row:span 2; }
 .carrinho-detalhes { grid-column:2; }
 .carrinho-quantidade { grid-column:2; }
 .carrinho-subtotal { grid-column:2; }
 .carrinho-remover { grid-column:3;grid-row:1; }
 .carrinho-qtd { width:100px; }
 .resumo-card { position:static; }
}
</style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
 <div class="container-fluid">
  <a class="navbar-brand fw-bold" href="index.php">LabMaker</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrincipal"><span class="navbar-toggler-icon"></span></button>
  <div class="collapse navbar-collapse" id="navbarPrincipal">
   <form class="d-flex mx-auto w-50" method="GET" action="index.php">
    <input class="form-control me-2" type="search" name="busca" placeholder="Pesquisar produtos...">
    <button class="btn btn-light" type="submit">Buscar</button>
   </form>
   <ul class="navbar-nav ms-auto">
    <li class="nav-item ms-3 fs-3"><a class="nav-link" href="Minha_Conta_Cliente.php" aria-label="Minha conta"><i class="bi bi-person"></i></a></li>
    <li class="nav-item ms-3 fs-3"><a class="nav-link active" href="Carrinho.php" aria-label="Carrinho"><i class="bi bi-cart"></i></a></li>
    <li class="nav-item ms-3"><a class="nav-link" href="Logout.php">Sair</a></li>
   </ul>
  </div>
 </div>
</nav>
<main class="container py-4 py-lg-5">
 <div class="mb-4">
  <h2 class="fw-bold mb-1"><i class="bi bi-cart3 me-2"></i>Meu carrinho</h2>
  <p class="text-secondary mb-0">Confira os produtos antes de finalizar sua compra.</p>
 </div>
 <?php if (isset($_GET['adicionado'])) { ?><div class="alert alert-success">Produto adicionado ao carrinho.</div><?php } ?>
 <?php if (isset($_GET['atualizado'])) { ?><div class="alert alert-success">Quantidades atualizadas.</div><?php } ?>
 <?php if (isset($_GET['removido'])) { ?><div class="alert alert-success">Produto removido do carrinho.</div><?php } ?>
 <?php if ($erro) { ?><div class="alert alert-danger"><?php echo e($erro); ?></div><?php } ?>
 <div class="row g-4 align-items-start">
  <section class="col-lg-8">
   <div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3"><h5 class="fw-bold mb-0">Produtos no carrinho (<?php echo count($itens); ?>)</h5></div>
    <?php if (!$itens) { ?>
     <div class="card-body text-center py-5">
      <i class="bi bi-cart-x display-4 text-secondary"></i>
      <h5 class="mt-3">Seu carrinho está vazio</h5>
      <p class="text-secondary">Explore nossos produtos e adicione o que precisa.</p>
      <a href="index.php" class="btn btn-primary"><i class="bi bi-shop me-1"></i>Ver produtos</a>
     </div>
    <?php } else { ?>
     <form method="POST">
      <input type="hidden" name="acao" value="atualizar">
      <?php foreach ($itens as $item) { ?>
       <div class="carrinho-item">
        <img class="carrinho-imagem" src="../../imagens/<?php echo e($item['Imagem']); ?>" alt="<?php echo e($item['Modelo']); ?>">
        <div class="carrinho-detalhes">
         <div class="carrinho-nome"><?php echo e($item['Modelo']); ?></div>
         <div class="text-secondary small">Unitário: R$ <?php echo number_format($item['Valor'],2,',','.'); ?></div>
         <div class="text-secondary small">Estoque disponível: <?php echo (int)$item['Qntd_Estoque']; ?></div>
        </div>
        <div class="carrinho-quantidade">
         <label class="form-label small mb-1" for="qtd<?php echo (int)$item['idItem']; ?>">Quantidade</label>
         <input id="qtd<?php echo (int)$item['idItem']; ?>" class="form-control form-control-sm carrinho-qtd" type="number" min="1" max="<?php echo max(1,(int)$item['Qntd_Estoque']); ?>" name="quantidades[<?php echo (int)$item['idItem']; ?>]" value="<?php echo (int)$item['quantidade']; ?>">
        </div>
        <div class="carrinho-subtotal">
         <div class="small text-secondary">Subtotal</div>
         <div class="carrinho-valor text-primary">R$ <?php echo number_format($item['subtotal'],2,',','.'); ?></div>
        </div>
        <div class="carrinho-remover">
         <button class="btn btn-sm btn-outline-danger" type="submit" form="remover<?php echo (int)$item['idItem']; ?>" title="Remover produto" aria-label="Remover produto"><i class="bi bi-trash"></i></button>
        </div>
       </div>
      <?php } ?>
      <div class="d-flex flex-wrap justify-content-between gap-2 p-3 border-top">
       <a href="index.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Continuar comprando</a>
       <button class="btn btn-primary" type="submit"><i class="bi bi-arrow-repeat me-1"></i>Atualizar carrinho</button>
      </div>
     </form>
     <?php foreach ($itens as $item) { ?>
      <form id="remover<?php echo (int)$item['idItem']; ?>" method="POST" class="d-none">
       <input type="hidden" name="acao" value="remover"><input type="hidden" name="idItem" value="<?php echo (int)$item['idItem']; ?>">
      </form>
     <?php } ?>
    <?php } ?>
   </div>
  </section>
  <aside class="col-lg-4">
   <div class="card border-0 shadow-sm resumo-card">
    <div class="card-header bg-white py-3"><h5 class="fw-bold mb-0"><i class="bi bi-receipt text-primary me-2"></i>Resumo da compra</h5></div>
    <div class="card-body">
     <div class="d-flex justify-content-between mb-3"><span class="text-secondary">Subtotal dos produtos</span><strong>R$ <?php echo number_format($total,2,',','.'); ?></strong></div>
     <div class="d-flex justify-content-between mb-3"><span class="text-secondary">Frete</span><span class="text-secondary">Calculado posteriormente</span></div>
     <hr>
     <div class="d-flex justify-content-between align-items-center mb-3"><span class="fw-bold fs-5">Total</span><span class="fw-bold fs-4 text-primary">R$ <?php echo number_format($total,2,',','.'); ?></span></div>
     <button class="btn btn-primary btn-lg w-100" type="button" disabled title="A finalização será integrada ao módulo de vendas"><i class="bi bi-credit-card me-2"></i>Finalizar compra</button>
     <small class="d-block text-secondary mt-2">A finalização do pedido ainda precisa ser integrada ao módulo de vendas.</small>
    </div>
   </div>
  </aside>
 </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
