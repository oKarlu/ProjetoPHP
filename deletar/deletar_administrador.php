<?php

// Verificando se temos o id
if (!empty($_GET['id'])) {

  include "../validacao/conn.php";
  require "../validacao/verifica.php";

  $id = $_GET['id'];

  $resultadoN = mysqli_query($conexao, "SELECT id FROM usuario WHERE email = '{$_SESSION['email']}' AND senha = '{$_SESSION['senha']}'");
  $linhasM = mysqli_num_rows($resultadoN);
  for ($m = 0; $m < $linhasM; $m++) {
    $idL = mysqli_fetch_row($resultadoN);
  }

  $logado;

  if ($id == $idL[0]) {
    $logado = 1;
  } else {
    $logado = 0;
  }

  $sqlSelect = "SELECT * FROM usuario WHERE id = '$id'";

  $result = $conexao->query($sqlSelect);

  if ($result->num_rows > 0) {
    $sqlDelete = "DELETE FROM usuario WHERE id = '$id'";
    $resultDelete = $conexao->query($sqlDelete);
  }

  if ($logado == 1) {

    header('Location: ../home/logout.php');
  } else {
    header('Location: ../listar/listar_administradores.php');
    $_SESSION['excluir'] = 1;
  }
}
