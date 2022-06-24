<?php
session_start();

if (isset($_POST['cadastrar_administrador'])) {

  include "../validacao/conn.php";

  $matricula    = $_POST['matricula'];
  $nome         = $_POST['nome'];
  $email        = $_POST['email'];
  $senha        = $_POST['senha'];


  $_SESSION['value_endereco'] = $_POST['endereco'];

  // Buscar se a matrícula já foi cadastrada ou não
  $query = ("SELECT matricula FROM usuario WHERE matricula = '$matricula'");
  $result = mysqli_query($conexao, $query);
  $row = mysqli_num_rows($result);

  // Buscar se o nome já foi cadastrado ou não
  $queryn = ("SELECT nome, cliente.nomeC FROM usuario, cliente WHERE nome = '$nome'");
  $resultn = mysqli_query($conexao, $queryn);
  $rown = mysqli_num_rows($resultn);

  // Buscar se o email já foi cadastrado ou não
  $querye = ("SELECT email, cliente.emailC FROM usuario, cliente WHERE email = '$email'");
  $resulte = mysqli_query($conexao, $querye);
  $rowe = mysqli_num_rows($resulte);

  if ($row > 0) {
    $url = 'http://localhost/projetoPHP/cadastrar/cad_administrador.php';
    $_SESSION['matricula_uso'] = "A Matrícula já está em uso<br>";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    $_SESSION['erroM'] = 1;
  } else {
    $_SESSION['value_matricula'] = $_POST['matricula'];
    $_SESSION['erroM'] = 0;
  }

  if ($rown > 0) {
    $url = 'http://localhost/projetoPHP/cadastrar/cad_administrador.php';
    $_SESSION['nome_uso'] = "O Nome já está em uso<br>";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    $_SESSION['erroN'] = 1;
  } else {
    $_SESSION['value_nome'] = $_POST['nome'];
    $_SESSION['erroN'] = 0;
  }

  if ($rowe > 0) {
    $url = 'http://localhost/projetoPHP/cadastrar/cad_administrador.php';
    $_SESSION['email_uso'] = "O E-mail já está em uso<br>";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    $_SESSION['erroE'] = 1;
  } else {
    $_SESSION['value_email'] = $_POST['email'];
    $_SESSION['erroE'] = 0;
  }

  


  if ($_SESSION['erroM'] == 0 and $_SESSION['erroN'] == 0 and $_SESSION['erroE'] == 0 and $_SESSION['erroT'] == 0) {

    // Query de Inserir usuario administrador no banco
    $sql = "INSERT INTO usuario(matricula, nome, email, senha, perfil_id) VALUES ";
    $sql .= "('$matricula','$nome','$email','$senha', '1')";
    $resultado = mysqli_query($conexao, $sql);
    echo "Administrador cadastrado com sucesso!!";
    unset($_SESSION['value_matricula']);
    unset($_SESSION['matricula_uso']);
    unset($_SESSION['value_nome']);
    unset($_SESSION['nome_uso']);
    unset($_SESSION['value_email']);
    unset($_SESSION['email_uso']);
    unset($_SESSIOn['erroM']);
    unset($_SESSIOn['erroN']);
    unset($_SESSIOn['erroE']);
    unset($_SESSIOn['erroT']);
    $_SESSION['sucesso'] = 1;

    header('Location: ../listar/listar_administradores.php');
    exit();
  }
}


//Cadastrar Gerente

if (isset($_POST['cadastrar_gerente'])) {

  include "../validacao/conn.php";

  $matricula    = $_POST['matricula'];
  $nome         = $_POST['nome'];
  $email        = $_POST['email'];
  $senha        = $_POST['senha'];


  $_SESSION['value_endereco'] = $_POST['endereco'];

  // Buscar se a matrícula já foi cadastrada ou não
  $query = ("SELECT matricula FROM usuario WHERE matricula = '$matricula'");
  $result = mysqli_query($conexao, $query);
  $row = mysqli_num_rows($result);

  // Buscar se o nome já foi cadastrado ou não
  $queryn = ("SELECT nome, cliente.nomeC FROM usuario, cliente WHERE nome = '$nome'");
  $resultn = mysqli_query($conexao, $queryn);
  $rown = mysqli_num_rows($resultn);

  // Buscar se o email já foi cadastrado ou não
  $querye = ("SELECT email, cliente.emailC FROM usuario, cliente WHERE email = '$email'");
  $resulte = mysqli_query($conexao, $querye);
  $rowe = mysqli_num_rows($resulte);

  if ($row > 0) {
    $url = 'http://localhost/projetoPHP/cadastrar/cad_gerente.php';
    $_SESSION['matricula_uso'] = "A Matrícula já está em uso<br>";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    $_SESSION['erroM'] = 1;
  } else {
    $_SESSION['value_matricula'] = $_POST['matricula'];
    $_SESSION['erroM'] = 0;
  }

  if ($rown > 0) {
    $url = 'http://localhost/projetoPHP/cadastrar/cad_gerente.php';
    $_SESSION['nome_uso'] = "O Nome já está em uso<br>";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    $_SESSION['erroN'] = 1;
  } else {
    $_SESSION['value_nome'] = $_POST['nome'];
    $_SESSION['erroN'] = 0;
  }

  if ($rowe > 0) {
    $url = 'http://localhost/projetoPHP/cadastrar/cad_gerente.php';
    $_SESSION['email_uso'] = "O E-mail já está em uso<br>";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
    $_SESSION['erroE'] = 1;
  } else {
    $_SESSION['value_email'] = $_POST['email'];
    $_SESSION['erroE'] = 0;
  }

  


  if ($_SESSION['erroM'] == 0 and $_SESSION['erroN'] == 0 and $_SESSION['erroE'] == 0 and $_SESSION['erroT'] == 0) {

    // Query de Inserir usuario gerente no banco
    $sql = "INSERT INTO usuario(matricula, nome, email, senha, perfil_id) VALUES ";
    $sql .= "('$matricula','$nome','$email','$senha', '2')";
    $resultado = mysqli_query($conexao, $sql);
    echo "Administrador cadastrado com sucesso!!";
    unset($_SESSION['value_matricula']);
    unset($_SESSION['matricula_uso']);
    unset($_SESSION['value_nome']);
    unset($_SESSION['nome_uso']);
    unset($_SESSION['value_email']);
    unset($_SESSION['email_uso']);
    unset($_SESSIOn['erroM']);
    unset($_SESSIOn['erroN']);
    unset($_SESSIOn['erroE']);
    unset($_SESSIOn['erroT']);
    $_SESSION['sucesso'] = 1;

    header('Location: ../listar/listar_gerentes.php');
    exit();
  }
}




// Cadastro de Cliente

if (isset($_POST['cadastrar_cliente'])) {

  include "../validacao/conn.php";

  $cpf       = $_POST['cpf'];
  $nome      = $_POST['nome'];
  $email     = $_POST['email'];
  $telefone  = $_POST['telefone'];


  // Buscar se o cpf já foi cadastrado ou não
  $queryc = ("SELECT cpf FROM cliente WHERE cpf = '$cpf'");
  $resultc = mysqli_query($conexao, $queryc);
  $rowc = mysqli_num_rows($resultc);

  // Buscar se o nome já foi cadastrado ou não
  $queryn = ("SELECT nomeC FROM cliente WHERE nomeC = '$nome'");
  $resultn = mysqli_query($conexao, $queryn);
  $rown = mysqli_num_rows($resultn);

  // Buscar se o email já foi cadastrado ou não
  $querye = ("SELECT emailC FROM cliente WHERE emailC = '$email'");
  $resulte = mysqli_query($conexao, $querye);
  $rowe = mysqli_num_rows($resulte);

  // Buscar se o matrícula já foi cadastrado ou não
  $queryt = ("SELECT telefoneC FROM cliente WHERE telefoneC = '$telefone'");
  $resultt = mysqli_query($conexao, $queryt);
  $rowt = mysqli_num_rows($resultt);

  if ($rowc > 0) {
    $url = 'http://localhost/projetoPHP/cadastrar/cad_cliente.php';
    $_SESSION['cpf_uso'] = "O CPF já está em uso<br>";
    $_SESSION['erroCPF'] = 1;
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
  } else {
    $_SESSION['value_cpf'] = $_POST['cpf'];
    $_SESSION['erroCPF'] = 0;
  }

  if ($rown > 0) {
    $url = 'http://localhost/projetoPHP/cadastrar/cad_cliente.php';
    $_SESSION['nomeC_uso'] = "O Nome já está em uso<br>";
    $_SESSION['erroN'] = 1;
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
  } else {
    $_SESSION['value_nomeC'] = $_POST['nome'];
    $_SESSION['erroN'] = 0;
  }

  if ($rowe > 0) {
    $url = 'http://localhost/projetoPHP/cadastrar/cad_cliente.php';
    $_SESSION['emailC_uso'] = "O E-mail já está em uso<br>";
    $_SESSION['erroE'] = 1;
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
  } else {
    $_SESSION['value_emailC'] = $_POST['email'];
    $_SESSION['erroE'] = 0;
  }

  if ($rowt > 0) {
    $url = 'http://localhost/projetoPHP/cadastrar/cad_cliente.php';
    $_SESSION['telefoneC_uso'] = "O telefone já está em uso<br>";
    $_SESSION['erroT'] = 1;
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url'>";
  } else {
    $_SESSION['value_telefoneC'] = $_POST['telefone'];
    $_SESSION['erroT'] = 0;
  }


  if ($_SESSION['erroCPF'] == 0 and $_SESSION['erroN'] == 0 and $_SESSION['erroE'] == 0 and $_SESSION['erroT'] == 0) {
    $sql = "INSERT INTO cliente(cpf, nomeC, emailC, telefoneC, perfil_id) VALUES ";
    $sql .= "('$cpf','$nome','$email','$telefone','3')";
    $resultado = mysqli_query($conexao, $sql);
    unset($_SESSION['value_nomeC']);
    unset($_SESSION['nomeC_uso']);
    unset($_SESSION['value_emailC']);
    unset($_SESSION['emailC_uso']);
    unset($_SESSION['value_cpf']);
    unset($_SESSION['cpf_uso']);
    unset($_SESSION['value_telefoneC']);
    unset($_SESSION['telefoneC_uso']);
    unset($_SESSIOn['erroCPF']);
    unset($_SESSIOn['erroN']);
    unset($_SESSIOn['erroE']);
    unset($_SESSIOn['erroT']);
    $_SESSION['sucesso'] = 1;
    header('Location: ../listar/listar_clientes.php');
    exit();
  }
}