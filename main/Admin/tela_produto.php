<?php

$conn = mysqli_connect("localhost", "root", "", "tcc");

if (!$conn) {
    die("Erro na conexão com o banco: " . mysqli_connect_error());
}


/* Verifica se o código do produto foi enviado */

if (!isset($_GET['Codigo']) || !is_numeric($_GET['Codigo'])) {
    die("Produto não encontrado.");
}

$codigo = intval($_GET['Codigo']);


/* Busca o produto selecionado */

$sql = "SELECT * FROM tbProduto
        WHERE Codigo = $codigo
        AND Status = 'Ativo'";

$resultado = mysqli_query($conn, $sql);


if (!$resultado || mysqli_num_rows($resultado) == 0) {
    die("Produto não encontrado.");
}


/* Dados do produto */

$produto = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo htmlspecialchars($produto['Modelo']); ?> - LabMaker Admin
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .produto-container,
        .informacoes-produto {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .imagem-produto {
            width: 100%;
            height: 450px;
            object-fit: contain;
        }

        .nome-produto {
            font-size: 30px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .preco-produto {
            font-size: 32px;
            font-weight: 700;
        }

        .titulo-secao {
            font-weight: 700;
        }

        @media (max-width: 576px) {
            .produto-container,
            .informacoes-produto {
                padding: 18px;
            }

            .imagem-produto {
                height: 300px;
            }

            .nome-produto {
                font-size: 24px;
            }

            .preco-produto {
                font-size: 28px;
            }
        }
    </style>
</head>

<body class="bg-light">

   <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container-fluid">

            <!-- Botão para telas pequenas -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse align-items-center" id="navbarPrincipal">

                <!-- Ações -->
                <ul class="navbar-nav me-3 align-items-center">
                    <li class="nav-item dropdown fs-5">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Ações
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Cadastros.php">Cadastros</a></li>
                            <li><a class="dropdown-item" href="Relatorios.php">Relatórios</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Logo -->
                <a class="navbar-brand fw-bold" href="Main-Admin.php">
                    LabMaker
                </a>

                <!-- Pesquisa -->
                <form class="d-flex mx-auto w-50">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar produtos...">

                    <button class="btn btn-light" type="submit">
                        Buscar
                    </button>
                </form>

                <!-- Menu direito -->
                <ul class="navbar-nav align-items-center">

                    <li class="nav-item ms-3 fs-3">
                        <a class="nav-link" href="Minha_Conta_Admin.php">
                            <i class="bi bi-person"></i>
                        </a>
                    </li>

                </ul>

            </div>
    </nav>

    <!-- CONTEÚDO -->

    <div class="container mt-4 mb-5">

        <!-- Voltar -->

        <div class="mb-4">
            <a href="Main-Admin.php"
               class="text-decoration-none text-secondary">

                <i class="bi bi-arrow-left"></i>
                Voltar para os produtos
            </a>
        </div>

        <!-- DETALHES DO PRODUTO -->

        <div class="produto-container">

            <div class="row g-5">

                <!-- Imagem -->

                <div class="col-lg-6">

                    <?php if (!empty($produto['Imagem'])) { ?>

                        <div class="text-center">

                            <img
                                src="../../imagens/<?php echo htmlspecialchars($produto['Imagem']); ?>"
                                class="imagem-produto"
                                alt="<?php echo htmlspecialchars($produto['Modelo']); ?>"
                            >

                        </div>

                    <?php } else { ?>

                        <div class="d-flex flex-column align-items-center justify-content-center text-secondary"
                             style="height: 450px;">

                            <i class="bi bi-image fs-1"></i>

                            <p class="mt-2">Imagem não disponível</p>

                        </div>

                    <?php } ?>

                </div>

                <!-- Informações principais -->

                <div class="col-lg-6">

                    <p class="text-secondary mb-2">
                        <?php echo htmlspecialchars($produto['Tipo']); ?>
                    </p>

                    <h1 class="nome-produto">
                        <?php echo htmlspecialchars($produto['Modelo']); ?>
                    </h1>

                    <p class="mt-3">
                        <strong>Marca:</strong>
                        <?php echo htmlspecialchars($produto['Marca']); ?>
                    </p>

                    <p class="text-secondary">
                        <strong>Código do produto:</strong>
                        <?php echo (int) $produto['Codigo']; ?>
                    </p>

                    <hr>

                    <p class="text-secondary mb-1">
                        Valor do produto:
                    </p>

                    <div class="preco-produto text-primary">
                        R$
                        <?php
                        echo number_format(
                            (float) $produto['Valor'],
                            2,
                            ',',
                            '.'
                        );
                        ?>
                    </div>

                    <p class="text-secondary">
                        Preço cadastrado no sistema
                    </p>

                    <!-- Estoque -->

                    <?php if ((int) $produto['Qntd_Estoque'] > 0) { ?>

                        <div class="alert alert-success mt-4">

                            <i class="bi bi-check-circle-fill"></i>

                            <strong>Produto em estoque</strong>

                            <br>

                            <small>
                                <?php echo (int) $produto['Qntd_Estoque']; ?>
                                unidade(s) disponível(is).
                            </small>

                        </div>

                    <?php } else { ?>

                        <div class="alert alert-danger mt-4">

                            <i class="bi bi-x-circle-fill"></i>

                            <strong>Produto sem estoque</strong>

                        </div>

                    <?php } ?>

                    <!-- Status -->

                    <p>
                        <strong>Status:</strong>

                        <?php if ($produto['Status'] == 'Ativo') { ?>

                            <span class="badge bg-success">
                                Ativo
                            </span>

                        <?php } else { ?>

                            <span class="badge bg-secondary">
                                <?php echo htmlspecialchars($produto['Status']); ?>
                            </span>

                        <?php } ?>
                    </p>

                    <!-- Ações administrativas -->

                    <div class="d-flex flex-wrap gap-2 mt-4">

                        <a
                            href="Produtos/Alterar-produto.php?Codigo=<?php echo (int) $produto['Codigo']; ?>"
                            class="btn btn-warning">

                            <i class="bi bi-pencil-square"></i>
                            Alterar produto
                        </a>

                        <a
                            href="Produtos/Listar-produto.php"
                            class="btn btn-outline-secondary">

                            <i class="bi bi-list-ul"></i>
                            Listar produtos
                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- DESCRIÇÃO -->

        <div class="informacoes-produto mt-4">

            <h3 class="titulo-secao">
                Descrição do produto
            </h3>

            <hr>

            <?php if (!empty($produto['Descricao'])) { ?>

                <p class="mb-0">
                    <?php
                    echo nl2br(
                        htmlspecialchars($produto['Descricao'])
                    );
                    ?>
                </p>

            <?php } else { ?>

                <p class="text-secondary mb-0">
                    Nenhuma descrição cadastrada para este produto.
                </p>

            <?php } ?>

        </div>

        <!-- INFORMAÇÕES TÉCNICAS -->

        <div class="informacoes-produto mt-4">

            <h3 class="titulo-secao">
                Informações do produto
            </h3>

            <hr>

            <div class="table-responsive">

                <table class="table table-bordered align-middle mb-0">

                    <tbody>

                        <tr>
                            <th style="width: 30%;">Código</th>
                            <td>
                                <?php echo (int) $produto['Codigo']; ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Modelo</th>
                            <td>
                                <?php echo htmlspecialchars($produto['Modelo']); ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Marca</th>
                            <td>
                                <?php echo htmlspecialchars($produto['Marca']); ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Tipo</th>
                            <td>
                                <?php echo htmlspecialchars($produto['Tipo']); ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Valor</th>
                            <td>
                                R$
                                <?php
                                echo number_format(
                                    (float) $produto['Valor'],
                                    2,
                                    ',',
                                    '.'
                                );
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Quantidade em estoque</th>
                            <td>
                                <?php echo (int) $produto['Qntd_Estoque']; ?>
                                unidade(s)
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                <?php echo htmlspecialchars($produto['Status']); ?>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>
</html>