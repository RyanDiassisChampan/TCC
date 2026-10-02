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

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo htmlspecialchars($produto['Modelo']); ?> - LabMaker
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


        /* Área principal do produto */

        .produto-container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }


        /* Imagem principal */

        .imagem-produto {
            width: 100%;
            height: 480px;
            object-fit: contain;
        }


        /* Nome */

        .nome-produto {
            font-size: 32px;
            font-weight: 700;
        }


        /* Preço */

        .preco-produto {
            font-size: 32px;
            font-weight: 700;
        }


        /* Miniatura */

        .imagem-miniatura {
            width: 80px;
            height: 80px;
            object-fit: contain;
            border: 2px solid #0d6efd;
            border-radius: 8px;
            padding: 5px;
        }


        /* Informações */

        .informacoes-produto {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }


        /* Título das seções */

        .titulo-secao {
            font-weight: 700;
        }


        /* Botão comprar */

        .botao-comprar {
            height: 50px;
            font-size: 18px;
            font-weight: 600;
        }

    </style>


    <link rel="stylesheet" href="style.css">
</head>


<body class="bg-light">


<!-- ========================================================= -->
<!-- NAVBAR - MANTIDA IGUAL À INDEX.PHP -->
<!-- ========================================================= -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">

    <div class="container-fluid">


        <!-- Área administrativa -->

        <ul class="navbar-nav me-3 align-items-center">

            <li class="nav-item ms-3 fs-3">

                <a class="nav-link"
                   href="../Admin/Main-Admin.php">

                    <i class="bi bi-person-fill-lock"></i>

                </a>

            </li>

        </ul>


        <!-- Logo -->

        <a class="navbar-brand fw-bold"
           href="index.php">

            LabMaker

        </a>


        <!-- Botão mobile -->

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarPrincipal">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse"
             id="navbarPrincipal">


            <!-- Barra de pesquisa -->

            <form class="d-flex mx-auto w-50">

                <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Pesquisar produtos..."
                >

                <button
                    class="btn btn-light"
                    type="submit">

                    Buscar

                </button>

            </form>


            <!-- Menu -->

            <ul class="navbar-nav ms-auto">


                <!-- Minha conta -->

                <li class="nav-item ms-3 fs-3">

                    <a class="nav-link"
                       href="Minha_Conta_Cliente.php">

                        <i class="bi bi-person"></i>

                    </a>

                </li>


                <!-- Carrinho -->

                <li class="nav-item ms-3 fs-3">

                    <a class="nav-link"
                       href="Carrinho.php">

                        <i class="bi bi-cart"></i>

                    </a>

                </li>


            </ul>

        </div>

    </div>

</nav>



<!-- ========================================================= -->
<!-- CONTEÚDO -->
<!-- ========================================================= -->

<div class="container mt-4 mb-5">


    <!-- VOLTAR -->

    <div class="mb-4">

        <a href="index.php"
           class="text-decoration-none text-secondary">

            <i class="bi bi-arrow-left"></i>

            Voltar para produtos

        </a>

    </div>



    <!-- ===================================================== -->
    <!-- PRODUTO -->
    <!-- ===================================================== -->

    <div class="produto-container">

        <div class="row g-5">


            <!-- ================================================= -->
            <!-- IMAGEM -->
            <!-- ================================================= -->

            <div class="col-lg-6">


                <?php if (!empty($produto['Imagem'])) { ?>


                    <div class="text-center">


                        <img
                            id="imagemPrincipal"
                            src="../../imagens/<?php echo htmlspecialchars($produto['Imagem']); ?>"
                            class="imagem-produto"
                            alt="<?php echo htmlspecialchars($produto['Modelo']); ?>"
                        >


                    </div>


                    <!-- Miniatura -->

                    <div class="d-flex gap-2 mt-3">


                        <img
                            src="../../imagens/<?php echo htmlspecialchars($produto['Imagem']); ?>"
                            class="imagem-miniatura"
                            alt="<?php echo htmlspecialchars($produto['Modelo']); ?>"
                        >


                    </div>


                <?php } else { ?>


                    <div
                        class="d-flex align-items-center justify-content-center"
                        style="height: 480px;"
                    >

                        <div class="text-center text-secondary">

                            <i class="bi bi-image fs-1"></i>

                            <p class="mt-2">

                                Imagem não disponível

                            </p>

                        </div>

                    </div>


                <?php } ?>


            </div>



            <!-- ================================================= -->
            <!-- INFORMAÇÕES PRINCIPAIS -->
            <!-- ================================================= -->

            <div class="col-lg-6">


                <!-- Tipo -->

                <p class="text-secondary mb-2">

                    <?php echo htmlspecialchars($produto['Tipo']); ?>

                </p>


                <!-- Nome -->

                <h1 class="nome-produto">

                    <?php echo htmlspecialchars($produto['Modelo']); ?>

                </h1>


                <!-- Marca -->

                <p class="mt-3">

                    <strong>Marca:</strong>

                    <?php echo htmlspecialchars($produto['Marca']); ?>

                </p>


                <hr>


                <!-- Preço -->

                <p class="text-secondary mb-1">

                    Por apenas:

                </p>


                <div class="preco-produto text-primary">

                    R$

                    <?php echo number_format(
                        $produto['Valor'],
                        2,
                        ',',
                        '.'
                    ); ?>

                </div>


                <p class="text-secondary">

                    à vista

                </p>



                <!-- ================================================= -->
                <!-- ESTOQUE -->
                <!-- ================================================= -->

                <?php if ($produto['Qntd_Estoque'] > 0) { ?>


                    <div class="alert alert-success mt-4">

                        <i class="bi bi-check-circle-fill"></i>

                        <strong>Produto disponível</strong>

                        <br>

                        <small>

                            <?php echo $produto['Qntd_Estoque']; ?>

                            unidade(s) disponível(is).

                        </small>

                    </div>


                <?php } else { ?>


                    <div class="alert alert-danger mt-4">

                        <i class="bi bi-x-circle-fill"></i>

                        <strong>Produto indisponível</strong>

                    </div>


                <?php } ?>



                <!-- ================================================= -->
                <!-- COMPRA -->
                <!-- ================================================= -->

                <?php if ($produto['Qntd_Estoque'] > 0) { ?>


                    <div class="row mt-4">


                        <!-- Quantidade -->

                        <div class="col-4">

                            <label class="form-label">

                                Quantidade

                            </label>

                            <input
                                type="number"
                                class="form-control"
                                value="1"
                                min="1"
                                max="<?php echo $produto['Qntd_Estoque']; ?>"
                            >

                        </div>


                        <!-- Comprar -->

                        <div class="col-8">

                            <label class="form-label">

                                &nbsp;

                            </label>

                            <button
                                class="btn btn-primary w-100 botao-comprar"
                            >

                                <i class="bi bi-cart-plus"></i>

                                Adicionar ao carrinho

                            </button>

                        </div>


                    </div>


                <?php } ?>

            </div>

        </div>

    </div>



    <!-- ===================================================== -->
    <!-- DESCRIÇÃO -->
    <!-- ===================================================== -->

    <div class="informacoes-produto mt-4">


        <h3 class="titulo-secao">

            Sobre o produto

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

                Nenhuma descrição disponível para este produto.

            </p>


        <?php } ?>


    </div>



    <!-- ===================================================== -->
    <!-- ESPECIFICAÇÕES -->
    <!-- ===================================================== -->

    <div class="informacoes-produto mt-4">


        <h3 class="titulo-secao">

            Informações do produto

        </h3>


        <hr>


        <div class="table-responsive">


            <table class="table table-bordered align-middle">


                <tbody>


                    <!-- Modelo -->

                    <tr>

                        <th style="width: 30%;">

                            Modelo

                        </th>

                        <td>

                            <?php echo htmlspecialchars($produto['Modelo']); ?>

                        </td>

                    </tr>


                    <!-- Marca -->

                    <tr>

                        <th>

                            Marca

                        </th>

                        <td>

                            <?php echo htmlspecialchars($produto['Marca']); ?>

                        </td>

                    </tr>


                    <!-- Tipo -->

                    <tr>

                        <th>

                            Tipo

                        </th>

                        <td>

                            <?php echo htmlspecialchars($produto['Tipo']); ?>

                        </td>

                    </tr>


                    <!-- Código -->

                    <tr>

                        <th>

                            Código

                        </th>

                        <td>

                            <?php echo $produto['Codigo']; ?>

                        </td>

                    </tr>


                    <!-- Estoque -->

                    <tr>

                        <th>

                            Estoque

                        </th>

                        <td>

                            <?php echo $produto['Qntd_Estoque']; ?>

                            unidade(s)

                        </td>

                    </tr>


                    <!-- Status -->

                    <tr>

                        <th>

                            Disponibilidade

                        </th>

                        <td>


                            <?php if ($produto['Qntd_Estoque'] > 0) { ?>


                                <span class="text-success">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Em estoque

                                </span>


                            <?php } else { ?>


                                <span class="text-danger">

                                    <i class="bi bi-x-circle-fill"></i>

                                    Fora de estoque

                                </span>


                            <?php } ?>


                        </td>

                    </tr>


                </tbody>

            </table>

        </div>


    </div>


</div>


</body>

</html>