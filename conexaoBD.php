<?php

    $host     = "localhost"; //Servidor de BD
    $user     = "root"; //Usuário do BD
    $senhaBD  = "root"; //Senha do BD
    $database = "generico"; //Nome do BD

    //Função do PHP para estabelecer conexão com o BD
    $conn = mysqli_connect($host, $user, $senhaBD, $database);

    //Se NÃO 
    if(!$conn){
        echo "<p>Erro ao tentar conectar à Base de Dados <strong>$database</strong>!</p>";
    }


?>