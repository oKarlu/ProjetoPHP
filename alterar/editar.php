<?php

include "../validacao/conn.php";
require "../validacao/verifica.php";

if(isset($_POST['atualizar_administrador']))
{
      $id           = $_POST['id'];
      $matricula    = $_POST['matricula'];
      $nome         = $_POST['nome'];
      $email        = $_POST['email'];
      $senha        = $_POST['senha'];
        
      $sqlUpdate = "UPDATE usuario SET nome = '$nome',
      email = '$email', senha = '$senha', matricula = $matricula WHERE id = '$id' ";

      $result = $conexao->query($sqlUpdate);  

      header ('Location: ../listar/listar_administradores.php');
}

if(isset($_POST['atualizar_cliente']))
{
      $id           = $_POST['id'];
      $nome         = $_POST['nome'];
      $cpf          = $_POST['cpf'];
      $email        = $_POST['email'];
      $telefone     = $_POST['telefone'];
        
      $sqlUpdate = "UPDATE cliente SET nomeC = '$nome',
      emailC = '$email', telefoneC = '$telefone', cpf = '$cpf' WHERE id = '$id' ";

      $result = $conexao->query($sqlUpdate);  

      header ('Location: ../listar/listar_clientes.php');
}

if(isset($_POST['atualizar_gerente']))
{
      $id           = $_POST['id'];
      $matricula    = $_POST['matricula'];
      $nome         = $_POST['nome'];
      $email        = $_POST['email'];
      $senha        = $_POST['senha'];
        
      $sqlUpdate = "UPDATE usuario SET nome = '$nome',
      email = '$email', senha = '$senha', matricula = $matricula WHERE id = '$id' ";

      $result = $conexao->query($sqlUpdate);  

      header ('Location: ../listar/listar_gerentes.php');
}
