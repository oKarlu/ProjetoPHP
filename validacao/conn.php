<?php
    $conexao = mysqli_connect("localhost","developer","1234567","phpdb");
    if (!$conexao) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $bd = mysqli_select_db($conexao,"phpdb");
     if (!$bd){
       Echo ("Banco de Dados inexistente ou Erro de conexão");
    }
?>
