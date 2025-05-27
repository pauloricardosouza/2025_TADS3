<?php include ("header.php") ?>

<div class='container mt-3 mb-3'>

    <?php

        session_start(); //Inicia sessão

        //Verifica se há sessão iniciada
        if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){

            if(isset($_POST['idProduto'])){

                $idUsuario   = $_SESSION['idUsuario']; //Captura o id do usuário logado (pela sessão)
                $idProduto   = $_POST['idProduto'];
                $fotoProduto = $_POST['fotoProduto'];
                $nomeProduto = $_POST['nomeProduto'];
                $valorCompra = $_POST['valorProduto'];
                $dataCompra  = date('Y-m-d'); //Captura a data atual
                $horaCompra  = date('H:i:s'); //Captura a hora atual

                //Query para inserir a compra na tabela Compras
                $efetuarCompra = "INSERT INTO Compras (idUsuario, idProduto, dataCompra, horaCompra, valorCompra) VALUES($idUsuario, $idProduto, '$dataCompra', '$horaCompra', $valorCompra)";
                $atualizarStatusProduto = "UPDATE Produtos SET statusProduto = 'esgotado' WHERE idProduto = $idProduto";

                //Incluir o arquivo de conexão com o banco de dados
                include("conexaoBD.php");

                if(mysqli_query($conn, $efetuarCompra)){
                    if(mysqli_query($conn, $atualizarStatusProduto)){
                        echo "
                            <div class='alert alert-success text-center'>
                                Você comprou $nomeProduto!
                                <i class='bi bi-emoji-smile'></i>
                            </div>
                        ";
                    }
                    else{
                        echo "
                            <div class='alert alert-danger text-center'>
                                Erro ao tentar efetuar a compra!
                                <i class='bi bi-emoji-frown'></i>
                            </div>
                        ";
                    }
                }
                else{
                    echo "
                        <div class='alert alert-danger text-center'>
                            Erro ao tentar efetuar a compra!
                            <i class='bi bi-emoji-frown'></i>
                        </div>
                    ";
                }

            }
            else{
                header('location:index.php');
            }
        }
        else{
            header('location:index.php');
        }

    ?>

</div>

<?php include ("footer.php") ?>