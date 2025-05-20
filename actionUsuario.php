<?php include "header.php" ?>

<div class='container mt-3 mb-3'>

<?php

    //Verifica o método de requisição do servidor
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Bloco para declaração de variáveis
        $fotoUsuario = $nomeUsuario = $dataNascimentoUsuario = $cidadeUsuario = $telefoneUsuario =
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
            //Usa a função preg_match para verificar o padrão de caracteres
            if(!preg_match('/^[\p{L} ]+$/u', $nomeUsuario)){
                echo "<div class='alert alert-warning text-center'>
                    O <strong>NOME</strong> deve conter apenas letras!
                </div>";
                $erroPreenchimento = true;
            }
        }

        //Validação do campo dataNascimentoUsuario
        //Utiliza a função empty para verificar se o campo está vazio
        if(empty($_POST["dataNascimentoUsuario"])){
            echo "<div class='alert alert-warning text-center'>
                    O campo <strong>DATA DE NASCIMENTO</strong> é obrigatório!
                </div>
            ";
            $erroPreenchimento = true;
        }
        else{
            //Armazena o valor na variável
            $dataNascimentoUsuario = testar_entrada($_POST["dataNascimentoUsuario"]);

            //Usa a função strlen para verificar o comprimento da string
            if(strlen($dataNascimentoUsuario) == 10){
                //Usa a função substr para pegar partes da string
                $dia = substr($dataNascimentoUsuario, 8, 2);
                $mes = substr($dataNascimentoUsuario, 5, 2);
                $ano = substr($dataNascimentoUsuario, 0, 4);

                //Usa a função checkdate para verificar se é uma data válida
                if(!checkdate($mes, $dia, $ano)){
                    echo "<div class='alert alert-warning text-center'>
                    <strong>DATA DE NASCIMENTO INVÁLIDA</strong>!
                    </div>";
                    $erroPreenchimento = true;
                }
            }
            else{
                echo "<div class='alert alert-warning text-center'>
                    <strong>DATA DE NASCIMENTO INVÁLIDA</strong>!
                </div>";
                $erroPreenchimento = true;
            }
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
            $senhaUsuario = md5(testar_entrada($_POST["senhaUsuario"]));
        }

        //Validação do campo confirmarSenhaUsuario
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
            $confirmarSenhaUsuario = md5(testar_entrada($_POST["confirmarSenhaUsuario"]));
            if($senhaUsuario != $confirmarSenhaUsuario){
                echo "<div class='alert alert-warning text-center'>
                        As <strong>SENHAS</strong> não conferem!
                    </div>";
                $erroPreenchimento = true;
            }
        }

        //Início da validação do campo FOTO
        $diretorio    = "img/"; //Define para qual diretório do sistema as imagens serão movidas
        $fotoUsuario  = $diretorio . basename($_FILES["fotoUsuario"]["name"]); //img/nomeDaFoto
        $erroUpload   = false; //Variável para verificar erros no upload
        $tipoDaImagem = strtolower(pathinfo($fotoUsuario, PATHINFO_EXTENSION));//Converter para minúsculo e adquirir a extensão do arquivo

        //Verificar se tamanho do arquivo é maior do que zero
        if ($_FILES['fotoUsuario']['size'] != 0){

            //Verificar se o tamanho do arquivo é maior do que 5MB (Em bytes)
            if($_FILES['fotoUsuario']['size'] > 5000000){
                echo "<div class='alert alert-warning text-center'>
                        A <strong>FOTO</strong> não deve possuir mais do que 5MB!
                    </div>";
                $erroUpload = true;
            }

            //Verificar o tipo do arquivo (pela extensão)
            if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp"){
                echo "<div class='alert alert-warning text-center'>
                    A <strong>FOTO</strong> deve estar no formato JPG, JPEG, PNG ou WEBP!
                </div>";
                $erroUpload = true;
            }

            //Verifica se houve algum erro no upload
            if($erroUpload){
                echo "<div class='alert alert-warning text-center'>
                    Erro ao tentar fazer o upload da <strong>FOTO</strong>!
                </div>";
                $erroUpload = true;
            }
            else{
                //Usa a função move_uploaded_file para mover o arquivo para o diretório img
                if(!move_uploaded_file($_FILES['fotoUsuario']['tmp_name'], $fotoUsuario)){
                    echo "<div class='alert alert-warning text-center'>
                        Erro ao tentar mover a <strong>FOTO</strong> para o diretório $diretorio!
                    </div>";
                $erroUpload = true;
                }
            }

        }

        //Se não houver erro de preenchimento ou erro de upload
        if(!$erroPreenchimento && !$erroUpload){

            //Criar uma QUERY responsável por realizar a inserção dos dados no BD
            $inserirUsuario = "INSERT INTO Usuarios (tipoUsuario, fotoUsuario, nomeUsuario, dataNascimentoUsuario, cidadeUsuario, telefoneUsuario, emailUsuario, senhaUsuario)
                                VALUES ('cliente', '$fotoUsuario', '$nomeUsuario', '$dataNascimentoUsuario', '$cidadeUsuario', '$telefoneUsuario', '$emailUsuario', '$senhaUsuario') ";

            //Inclui o arquivo de conexão com o BD
            include "conexaoBD.php";

            //Se a query for executada com sucesso, exibe mensagem e tabela
            if(mysqli_query($conn, $inserirUsuario)){

                echo "<div class='alert alert-success text-center'>Usuário(a) cadastrado(a) com sucesso!</div>";
                
                echo "<div class='container mt-3'>
                        <div class='mt-3 text-center'>
                            <img src='$fotoUsuario' style='width:150px' title='Foto de $nomeUsuario'>
                        </div>
                        <div class='table-responsive'>
                            <table class='table'>
                                <tr>
                                    <th>NOME</th>
                                    <td>$nomeUsuario</td>
                                </tr>
                                <tr>
                                    <th>DATA DE NASCIMENTO</th>
                                    <td>$dia/$mes/$ano</td>
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
                mysqli_close($conn); //Encerra a conexão com o banco de dados
            }
            //Se não conseguir inserir dados do Usuário na base de dados, emite alerta danger
            else{
                echo "<div class='alert alert-danger text-center'>
                            Erro ao tentar inserir dados do <strong>Usuário</strong> na base de dados!
                        </div>";
            }
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