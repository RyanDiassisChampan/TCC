<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>LabMaker</title>
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


                    <!-- Usuário -->
                    <li class="nav-item ms-3 fs-3">

                        <a class="nav-link" href="Login-Admin.php">

                            <i class="bi bi-person"></i>

                        </a>

                    </li>

                </ul>

            </div>

        </div>
    </nav>


    <!-- Conteúdo -->
    <main class="container py-5">

        <!-- Título -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="mb-1">
                    Relatório de Estoque
                </h2>

                <p class="text-muted mb-1">
                    Consulte a quantidade e a situação dos produtos em estoque.
                </p>
            </div>

        </div>


        <!-- Filtros -->
        <div class="card shadow-sm mb-4">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="bi bi-funnel"></i>
                    Filtros

                </h5>

            </div>

            <div class="card-body">

                <div class="row g-3">

                    <!-- Produto -->
                    <div class="col-md-5">

                        <label class="form-label">
                            Produto
                        </label>

                        <input type="text" class="form-control" placeholder="Digite o nome do produto">

                    </div>


                    <!-- Tipo -->
                    <div class="col-md-4">

                        <label class="form-label">
                            Tipo
                        </label>

                        <select class="form-select">

                            <option selected>
                                Todos os Tipos
                            </option>

                            <option>
                                Processadores
                            </option>

                            <option>
                                Placas-Mãe
                            </option>

                            <option>
                                Placas de Vídeo
                            </option>

                            <option>
                                Memórias RAM
                            </option>

                            <option>
                                Armazenamento
                            </option>

                            <option>
                                Fonte
                            </option>

                            <option>
                                Refrigeração
                            </option>

                            <option>
                                Gabinete
                            </option>

                        </select>

                    </div>


                    <!-- Situação -->
                    <div class="col-md-3">

                        <label class="form-label">
                            Situação
                        </label>

                        <select class="form-select">

                            <option selected>
                                Todas
                            </option>

                            <option>
                                Em estoque
                            </option>

                            <option>
                                Estoque baixo
                            </option>

                            <option>
                                Sem estoque
                            </option>

                        </select>

                    </div>

                </div>


                <!-- Botões -->
                <div class="d-flex justify-content-end gap-2 mt-4">

                    <button type="button" class="btn btn-secondary">

                        <i class="bi bi-eraser"></i>
                        Limpar

                    </button>

                    <button type="button" class="btn btn-primary">

                        <i class="bi bi-search"></i>
                        Pesquisar

                    </button>

                </div>

            </div>

        </div>


        <!-- Resumo -->
        <div class="row g-4 mb-4">


            <!-- Tabela -->
            <div class="card shadow-sm">

                <div class="card-header bg-white">

                    <div class="d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">

                            <i class="bi bi-boxes"></i>
                            Produtos em Estoque

                        </h5>

                        <button class="btn btn-outline-primary btn-sm">

                            <i class="bi bi-printer"></i>
                            Imprimir

                        </button>

                    </div>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover table-bordered align-middle mb-0">

                            <thead class="table-light">

                                <tr>

                                    <th>
                                        Código
                                    </th>

                                    <th>
                                        Produto
                                    </th>

                                    <th>
                                        Tipo
                                    </th>

                                    <th class="text-center">
                                        Quantidade
                                    </th>

                                    <th>
                                        Valor Unitário
                                    </th>

                                    <th>
                                        Valor em Estoque
                                    </th>

                                    <th class="text-center">
                                        Situação
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                <tr>

                                    <td>
                                        001
                                    </td>

                                    <td>
                                        Ryzen 5 5600GT
                                    </td>

                                    <td>
                                        Processadores
                                    </td>

                                    <td class="text-center">
                                        15
                                    </td>

                                    <td>
                                        R$ 899,90
                                    </td>

                                    <td>
                                        R$ 13.498,50
                                    </td>

                                    <td class="text-center">

                                        <span class="badge text-bg-success">
                                            Em estoque
                                        </span>

                                    </td>

                                </tr>
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <div class="mt-3">
                <a href="javascript:history.back()" class="btn btn-primary">

                    <i class="bi bi-arrow-left"></i>
                    Voltar

                </a>
            </div>

    </main>


</body>

</html>