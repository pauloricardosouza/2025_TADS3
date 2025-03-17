<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Genérico</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>

        <div class="p-3 text-center">
            <a href="index.php" title="Clique no logo para retornar ao início">
                <img src="img/generico_logo.png" alt="Logotipo" style='width: 150px;'>
            </a>
        </div>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="formProduto.php">Cadastrar Produto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="formLogin.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5 mb-5">
            <div class="alert alert-info text-center">Há <strong>X</strong> produtos cadastrados!</div>
            <form name="formFiltro" action="index.php" method="GET">
                <div class="form-floating mt-3">
                    <select class="form-select" name="filtroProduto" required>
                        <option value="todos">Visualizar todos os Produtos</option>
                        <option value="disponivel">Visualizar apenas Produtos disponíveis</option>
                        <option value="esgotado">Visualizar apenas Produtos esgotados</option>
                    </select>
                    <label for="filtroProduto">Selecione um Filtro</label>
                    <br>
                </div>
                <button type="submit" class="btn btn-success" style='float:right'><i class='bi bi-funnel'></i>  Filtrar Produtos</button><br>
            </form>

            <hr>

            <div class="row">
                <div class="col-sm-3">

                    <div class="card" style="width:100%; height:100%;">
                        <div class="card-body" style="height:100%">
                            <a href="visualizarProduto.php" style="text-decoration:none;" title="Visualizar Produto de NOME DO PRODUTO">
                                <img class="card-img-top" src="img/generico_logo.png" alt="Foto de NOME DO PRODUTO">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">Nome do Produto</h4>
                            <p class="card-text">Valor: <b>R$ Valor do Produto</b></p>
                            <div class="d-grid" style="border-size:border-box">
                                <a class="btn btn-success" href="visualizarProduto.php" style="text-decoration:none;"  title="Visualizar NOME DO PRODUTO">
                                    Visualizar Produto
                                </a>  
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-5 p-2 bg-dark text-white text-center fixed-bottom">
            <p>Sistema Genérico desenvolvido nas aulas de Programação Web do curso de TADS - <?php echo $anoAtual = date('Y')?>	&copy;</p>
        </div>

    </body>
</html>
