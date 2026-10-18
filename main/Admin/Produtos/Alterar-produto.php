<?php
$conexao = mysqli_connect('localhost', 'root', '', 'tcc');
if (!$conexao) {
    die('Erro ao conectar ao banco de dados.');
}

$codigo = filter_input(INPUT_GET, 'Codigo', FILTER_VALIDATE_INT);
if (!$codigo) {
    die('Código do produto inválido.');
}

$erros = [];
$mensagem = '';

$stmt = mysqli_prepare($conexao, 'SELECT * FROM tbProduto WHERE Codigo = ?');
mysqli_stmt_bind_param($stmt, 'i', $codigo);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$registro = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($stmt);

if (!$registro) {
    die('Produto não encontrado.');
}

if (isset($_POST['salvar'])) {
    $modelo = trim($_POST['modelo'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $valor = str_replace(',', '.', trim($_POST['valor'] ?? ''));
    $qntdEstoque = filter_var($_POST['qntdEstoque'] ?? null, FILTER_VALIDATE_INT);
    $status = $_POST['Status'] ?? '';
    $nomeImagem = $registro['Imagem'] ?? '';
    $novaImagemMovida = null;

    if ($modelo === '') $erros[] = 'Informe o modelo do produto.';
    if ($descricao === '') $erros[] = 'Informe a descrição do produto.';
    if (!is_numeric($valor) || (float)$valor < 0) $erros[] = 'Informe um valor válido.';
    if ($qntdEstoque === false || $qntdEstoque < 0) $erros[] = 'Informe uma quantidade de estoque válida.';
    if (!in_array($status, ['Ativo', 'Inativo'], true)) $erros[] = 'Selecione um status válido.';

    // A imagem é opcional na alteração: sem novo arquivo, mantém a imagem atual.
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] !== UPLOAD_ERR_NO_FILE) {
        if ($_FILES['imagem']['error'] !== UPLOAD_ERR_OK) {
            $erros[] = 'Não foi possível receber a nova imagem.';
        } elseif ($_FILES['imagem']['size'] > 5 * 1024 * 1024) {
            $erros[] = 'A imagem não pode ter mais de 5 MB.';
        } else {
            $tmp = $_FILES['imagem']['tmp_name'];
            $mime = mime_content_type($tmp);
            $extensoesPermitidas = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/webp' => 'webp'
            ];
            if (!isset($extensoesPermitidas[$mime])) {
                $erros[] = 'A imagem deve estar no formato JPG, PNG ou WEBP.';
            } else {
                $pastaImagens = __DIR__ . '/../../../imagens/';
                if (!is_dir($pastaImagens) && !mkdir($pastaImagens, 0755, true)) {
                    $erros[] = 'Não foi possível acessar a pasta de imagens.';
                } else {
                    $nomeImagem = uniqid('produto_', true) . '.' . $extensoesPermitidas[$mime];
                    $destino = $pastaImagens . $nomeImagem;
                    if (move_uploaded_file($tmp, $destino)) {
                        $novaImagemMovida = $destino;
                    } else {
                        $erros[] = 'Não foi possível salvar a nova imagem.';
                    }
                }
            }
        }
    }

    if (empty($erros)) {
        $sql = 'UPDATE tbProduto SET Modelo = ?, Descricao = ?, Valor = ?, Qntd_Estoque = ?, Status = ?, Imagem = ? WHERE Codigo = ?';
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, 'ssdissi', $modelo, $descricao, $valor, $qntdEstoque, $status, $nomeImagem, $codigo);

        if (mysqli_stmt_execute($stmt)) {
            $mensagem = 'Produto alterado com sucesso.';
            // Exclui a imagem anterior somente depois que o banco salva a nova.
            if ($novaImagemMovida !== null && !empty($registro['Imagem'])) {
                $imagemAntiga = __DIR__ . '/../../../imagens/' . basename($registro['Imagem']);
                if (is_file($imagemAntiga) && realpath($imagemAntiga) !== realpath($novaImagemMovida)) {
                    @unlink($imagemAntiga);
                }
            }
            $registro['Modelo'] = $modelo;
            $registro['Descricao'] = $descricao;
            $registro['Valor'] = $valor;
            $registro['Qntd_Estoque'] = $qntdEstoque;
            $registro['Status'] = $status;
            $registro['Imagem'] = $nomeImagem;
        } else {
            $erros[] = 'Não foi possível alterar o produto no banco de dados.';
            if ($novaImagemMovida !== null && is_file($novaImagemMovida)) @unlink($novaImagemMovida);
        }
        mysqli_stmt_close($stmt);
    } elseif ($novaImagemMovida !== null && is_file($novaImagemMovida)) {
        @unlink($novaImagemMovida);
    }
}

function h($valor) {
    return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar produto - LabMaker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <main class="container py-4" style="max-width: 900px;">
        <div class="card shadow-sm mb-3"><div class="card-body">
            <h1 class="h4 mb-0"><i class="bi bi-pencil-square me-2"></i>Alteração de Produto</h1>
        </div></div>

        <?php if ($mensagem !== ''): ?><div class="alert alert-success"><i class="bi bi-check-circle me-2"></i><?= h($mensagem) ?></div><?php endif; ?>
        <?php if ($erros): ?><div class="alert alert-danger"><ul class="mb-0"><?php foreach ($erros as $erro): ?><li><?= h($erro) ?></li><?php endforeach; ?></ul></div><?php endif; ?>

        <form method="post" enctype="multipart/form-data" class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input name="modelo" type="text" class="form-control" value="<?= h($registro['Modelo']) ?>" id="modelo" maxlength="100" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea name="descricao" class="form-control" id="descricao" rows="3" maxlength="350" required><?= h($registro['Descricao']) ?></textarea>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="valor" class="form-label">Valor (R$)</label>
                        <input name="valor" type="number" step="0.01" min="0" class="form-control" value="<?= h($registro['Valor']) ?>" id="valor" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="qntdEstoque" class="form-label">Quantidade em estoque</label>
                        <input name="qntdEstoque" type="number" min="0" step="1" class="form-control" value="<?= h($registro['Qntd_Estoque']) ?>" id="qntdEstoque" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="Status" class="form-label">Status</label>
                    <select class="form-select" name="Status" id="Status" required>
                        <option value="Ativo" <?= ($registro['Status'] === 'Ativo') ? 'selected' : '' ?>>Ativo</option>
                        <option value="Inativo" <?= ($registro['Status'] === 'Inativo') ? 'selected' : '' ?>>Inativo</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Imagem atual</label>
                    <?php if (!empty($registro['Imagem']) && is_file(__DIR__ . '/../../../imagens/' . basename($registro['Imagem']))): ?>
                        <img src="../../../imagens/<?= rawurlencode(basename($registro['Imagem'])) ?>" alt="Imagem atual do produto" class="img-thumbnail mb-2" style="width: 150px; height: 130px; object-fit: contain; background: #fff;">
                    <?php else: ?>
                        <div class="text-muted small mb-2">Nenhuma imagem encontrada para este produto.</div>
                    <?php endif; ?>
                    <label for="imagem" class="form-label">Alterar imagem (opcional)</label>
                    <input type="file" class="form-control" id="imagem" name="imagem" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                    <div class="form-text">JPG, PNG ou WEBP, até 5 MB. Se não selecionar um arquivo, a imagem atual será mantida.</div>
                </div>
            </div>
            <div class="card-footer bg-white d-flex flex-wrap gap-2">
                <a href="Listar-produto.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-return-left me-1"></i>Voltar</a>
                <button name="salvar" type="submit" class="btn btn-primary"><i class="bi bi-floppy me-1"></i>Salvar alterações</button>
            </div>
        </form>
    </main>
</body>
</html>
