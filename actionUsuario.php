<?php include "header.php" ?>

<div class='container mt-3 mb-3'>

<?php

    //Verifica o método de requisição do servidor
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Bloco para declaração de variáveis
        $fotoUsuario = $nomeUsuario = $cidadeUsuario = $telefoneUsuario =
        $emailUsuario = $senhaUsuario = $confirmarSenhaUsuario = "";
        $erroPreenchimento = false;

        //Validação do campo nomeUsuario
        //Utiliza a função empty para verificar se o campo está vazio
        if(empty($_POST["nomeUsuario"])){
            echo "<div class='alert alert-warning text-center'>
                    O campo <strong>NOME</strong> é obrigatório!
                </div>
            ";
            $erroPreenchimento = true;
        }
        else{
            //Armazena o valor na variável
            $nomeUsuario = testar_entrada($_POST["nomeUsuario"]);
        }

        //Validação do campo cidadeUsuario
        //Utiliza a função empty para verificar se o campo está vazio
        if(empty($_POST["cidadeUsuario"])){
            echo "<div class='alert alert-warning text-center'>
                    O campo <strong>CIDADE</strong> é obrigatório!
                </div>
            ";
            $erroPreenchimento = true;
        }
        else{
            //Armazena o valor na variável
            $cidadeUsuario = testar_entrada($_POST["cidadeUsuario"]);
        }

        //Validação do campo telefoneUsuario
        //Utiliza a função empty para verificar se o campo está vazio
        if(empty($_POST["telefoneUsuario"])){
            echo "<div class='alert alert-warning text-center'>
                    O campo <strong>TELEFONE</strong> é obrigatório!
                </div>
            ";
            $erroPreenchimento = true;
        }
        else{
            //Armazena o valor na variável
            $telefoneUsuario = testar_entrada($_POST["telefoneUsuario"]);
        }

        //Validação do campo emailUsuario
        //Utiliza a função empty para verificar se o campo está vazio
        if(empty($_POST["emailUsuario"])){
            echo "<div class='alert alert-warning text-center'>
                    O campo <strong>EMAIL</strong> é obrigatório!
                </div>
            ";
            $erroPreenchimento = true;
        }
        else{
            //Armazena o valor na variável
            $emailUsuario = testar_entrada($_POST["emailUsuario"]);
        }

        //Validação do campo senhaUsuario
        //Utiliza a função empty para verificar se o campo está vazio
        if(empty($_POST["senhaUsuario"])){
            echo "<div class='alert alert-warning text-center'>
                    O campo <strong>SENHA</strong> é obrigatório!
                </div>
            ";
            $erroPreenchimento = true;
        }
        else{
            //Armazena o valor na variável
            $senhaUsuario = testar_entrada($_POST["senhaUsuario"]);
        }

        //Validação do campo senhaUsuario
        //Utiliza a função empty para verificar se o campo está vazio
        if(empty($_POST["confirmarSenhaUsuario"])){
            echo "<div class='alert alert-warning text-center'>
                    O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!
                </div>
            ";
            $erroPreenchimento = true;
        }
        else{
            //Armazena o valor na variável
            $confirmarSenhaUsuario = testar_entrada($_POST["confirmarSenhaUsuario"]);
            if($senhaUsuario != $confirmarSenhaUsuario){
                echo "<div class='alert alert-warning text-center'>
                        As <strong>SENHAS</strong> não conferem!
                    </div>";
                $erroPreenchimento = true;
            }
        }

        if(!$erroPreenchimento){
            echo "<div class='alert alert-success text-center'>
                        Usuário(a) cadastrado(a) com sucesso!
                    </div>";
            
            echo "<div class='container mt-3'>
                    <div class='mt-3 text-center'>
                        FOTO
                    </div>
                    <div class='table-responsive'>
                        <table class='table'>
                            <tr>
                                <th>NOME</th>
                                <td>$nomeUsuario</td>
                            </tr>
                            <tr>
                                <th>CIDADE</th>
                                <td>$cidadeUsuario</td>
                            </tr>
                            <tr>
                                <th>TELEFONE</th>
                                <td>$telefoneUsuario</td>
                            </tr>
                            <tr>
                                <th>EMAIL</th>
                                <td>$emailUsuario</td>
                            </tr>
                        </table>
                    </div>
                </div>
            
            ";
        }

    }
    else{
        //Redireciona para a página formUsuario.php
        header("location:formUsuario.php");
    }

    function testar_entrada($dado){
        $dado = trim($dado); //TRIM - Remove espaços desnecessários
        $dado = stripslashes($dado); //Remove barras invertidas
        $dado = htmlspecialchars($dado); //Converte caracteres especiais

        return($dado);
    }

?>

</div>

<?php include "footer.php" ?>