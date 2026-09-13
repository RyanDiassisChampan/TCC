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

                    <li class="nav-item ms-3 fs-3">
                        <a class="nav-link" href="MinhaConta.php">
                            <i class="bi bi-person"></i>
                        </a>
                    </li>

                </ul>

            </div>
    </nav>


    <!-- Conteúdo -->
    <main class="container-fluid px-4 py-4">

        <!-- Cabeçalho -->
        <div class="mb-4">

            <h2>
                Relatório de Vendas
            </h2>

            <p class="text-muted">
                Consulte e acompanhe as vendas realizadas na LabMaker.
            </p>

        </div>


        <!-- Filtros -->
        <div class="card shadow-sm mb-4">

            <div class="card-body">

                <div class="row g-3">


                    <!-- Pesquisa -->
                    <div class="col-md-4">

                        <label class="form-label">
                            Pesquisar
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">

                                <i class="bi bi-search"></i>

                            </span>

                            <input type="text" class="form-control" placeholder="Código da venda ou cliente">

                        </div>

                    </div>


                    <!-- Status -->
                    <div class="col-md-2">

                        <label class="form-label">
                            Status
                        </label>

                        <select class="form-select">

                            <option selected>
                                Todos
                            </option>

                            <option>
                                Pago
                            </option>

                            <option>
                                Pendente
                            </option>

                            <option>
                                Cancelado
                            </option>

                        </select>

                    </div>


                    <!-- Data inicial -->
                    <div class="col-md-2">

                        <label class="form-label">
                            Data inicial
                        </label>

                        <input type="date" class="form-control">

                    </div>


                    <!-- Data final -->
                    <div class="col-md-2">

                        <label class="form-label">
                            Data final
                        </label>

                        <input type="date" class="form-control">

                    </div>


                    <!-- Filtrar -->
                    <div class="col-md-2 d-flex align-items-end">

                        <button class="btn btn-primary w-100">

                            <i class="bi bi-funnel"></i>

                            Filtrar

                        </button>

                    </div>

                </div>

            </div>

        </div>


        <!-- Resumo -->
        <div class="row g-4 mb-4">

            <!-- Tabela -->
            <div class="card shadow-sm">

                <div class="card-header bg-white">

                    <h5 class="mb-0">
                        Histórico de vendas
                    </h5>

                </div>


                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">

                                <tr>

                                    <th class="ps-4" style="width: 11%;">
                                        Código
                                    </th>

                                    <th style="width: 11%;">
                                        Data
                                    </th>

                                    <th style="width: 11%;">
                                        Cliente
                                    </th>

                                    <th style="width: 11%;">
                                        Produtos
                                    </th>

                                    <th style="width: 13%;">
                                        Forma de Recebimento
                                    </th>

                                    <th style="width: 11%;">
                                        Valor Recebido
                                    </th>

                                    <th style="width: 11%;">
                                        Total
                                    </th>

                                    <th style="width: 10%;">
                                        Status
                                    </th>

                                    <th class="text-center pe-4" style="width: 11%;">
                                        Ações
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                            </tbody>

                        </table>

                    </div>

                </div>


                <div class="mt-4">
                    <a href="javascript:history.back()" class="btn btn-primary">

                        <i class="bi bi-arrow-left"></i>
                        Voltar

                    </a>
                </div>

    </main>

</body>

</html>