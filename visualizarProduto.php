<?php include "header.php" ?>

<div class="container text-center mt-5 mb-5">

    <?php

        if(isset($_GET['idProduto'])){
            $idProduto = $_GET['idProduto'];

            //Inclui o arquivo de conexão com o Banco de Dados
            include("conexaoBD.php");

            $exibirProduto = "SELECT * FROM Produtos WHERE idProduto = $idProduto";
            $res           = mysqli_query($conn, $exibirProduto); //Executa o comando
            $totalProdutos = mysqli_num_rows($res); //Retorna a quantidade de registros

            if($totalProdutos > 0){
                echo "<div class='row text-center'>";

                    if($registro = mysqli_fetch_assoc($res)){
                        $idProduto        = $registro["idProduto"];
                        $fotoProduto      = $registro["fotoProduto"];
                        $nomeProduto      = $registro["nomeProduto"];
                        $descricaoProduto = $registro["descricaoProduto"];
                        $valorProduto     = $registro["valorProduto"];
                        $statusProduto    = $registro["statusProduto"];
                    
                        ?>

                        <div class="d-flex justify-content-center mb-3">

                            <div class="card" style="width:30%; border-style:none;">
                                            
                                <!-- Carousel -->
                                <div id="Produto" class="carousel slide" data-bs-ride="carousel" >

                                    <!-- Indicators/dots -->
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#Produto" data-bs-slide-to="0" class="active"></button>
                                        <button type="button" data-bs-target="#Produto" data-bs-slide-to="1"></button>
                                        <button type="button" data-bs-target="#Produto" data-bs-slide-to="2"></button>
                                    </div>

                                    <?php
                                        if($statusProduto == 'esgotado'){
                                            echo "<h1>Produto esgotado!</h1>";
                                        }
                                    ?>

                                    <!-- The slideshow/carousel -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?php echo $fotoProduto ?>" alt="Nome do Produto" class="d-block" <?php if($statusProduto == 'esgotado') {echo "style='width: 100%; filter:grayscale(100%)'";} else {echo "style='width:100%'";}?> >
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo $fotoProduto ?>" alt="Nome do Produto" class="d-block" <?php if($statusProduto == 'esgotado') {echo "style='width: 100%; filter:grayscale(100%)'";} else {echo "style='width:100%'";}?> >
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?php echo $fotoProduto ?>" alt="Nome do Produto" class="d-block" <?php if($statusProduto == 'esgotado') {echo "style='width: 100%; filter:grayscale(100%)'";} else {echo "style='width:100%'";}?> >
                                        </div>
                                    </div>

                                    <!-- Left and right controls/icons -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#Produto" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#Produto" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                </div>
                                
                                <div class="card-body">
                                    <h4 class="card-title"><b><?php echo $nomeProduto ?></b></h4>
                                    <p class="card-text"><?php echo $descricaoProduto ?></p>
                                    <p class="card-text">Valor: <b>R$ <?php echo $valorProduto ?></b></p>
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <a href="#" title="Efetuar Compra">
                                                <button class="btn btn-outline-success">
                                                    <i class="bi bi-bag-plus" style="font-size:16pt;"></i>
                                                    Efetuar Compra
                                                </button>
                                            </a>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    else{
                        echo ("<div class='alert alert-danger text-center'>Produto não localizado!</div>");
                    }
                echo "</div>";
            }
        }
        else{
            echo ("<div class='alert alert-danger text-center'>Não foi possível carregar o produto!</div>");
        }

        ?>

<?php include "footer.php" ?>