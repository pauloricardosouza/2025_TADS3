<?php include ("header.php") ?>

<div class='container'>

    <div class='row'>
        <!-- Coluna para exibir o select para listar Usuários -->
        <div class='col-sm-6'>
            <div class='form-floating mb-3 mt-3'>
                <select class='form-select' name='nomeUsuario'>
                    <?php
                        include("conexaoBD.php");
                        $listarUsuarios = "SELECT * FROM Usuarios";
                        $res = mysqli_query($conn, $listarUsuarios) or die("<div class='alert alert-danger text-center'>Erro ao tentar carregar <strong>Usuários</strong></div>"); 
                        while($registro = mysqli_fetch_assoc($res)){
                            $idUsuario   = $registro['idUsuario'];
                            $nomeUsuario = $registro['nomeUsuario'];
                            echo "<option value='$idUsuario'>$nomeUsuario</option>"; 
                        }
                    ?>
                </select>
                <label for='nomeUsuario' class='form-label'>Selecione um Usuário</label>
            </div>
        </div>
        <!-- Coluna para exibir o select para listar Produtos -->
        <div class='col-sm-6'>
            <div class='form-floating mb-3 mt-3'>
                <select class='form-select' name='nomeProduto'>
                <?php
                        include("conexaoBD.php");
                        $listarProdutos = "SELECT * FROM Produtos";
                        $res = mysqli_query($conn, $listarProdutos) or die("<div class='alert alert-danger text-center'>Erro ao tentar carregar <strong>Produtos</strong></div>"); 
                        while($registro = mysqli_fetch_assoc($res)){
                            $idProduto   = $registro['idProduto'];
                            $nomeProduto = $registro['nomeProduto'];
                            echo "<option value='$idProduto'>$nomeProduto</option>"; 
                        }
                    ?>
                </select>
                <label for='nomeProduto' class='form-label'>Selecione um Produto</label>
            </div>
        </div>
    </div>

</div>

<?php include ("footer.php") ?>