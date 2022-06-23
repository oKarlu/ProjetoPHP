<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../style/stylemenu.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<!-- Modal -->
<div class='modal fade' id='modalExemplo' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Deseja sair da conta?</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>
          <div class='modal-body'>
            <p style='color: #f00;'>*Ao sair da conta sua sessão será encerrada!</p>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary ' data-dismiss='modal'>Fechar</button>
            <a class = 'btn  btn-primary' href = 'logout.php'>Encerrar Sessão</a>
          </div>
        </div>
      </div>
    </div>

<header id="header">
    <nav class="container">
      <a class="logo" href="../home/index.php">Games <span>Baratos</span></a>

      <!-- MENU -->
      <div class="dd-menu">
        <ul>
          <li><a href="#">Cadastrar</a>
            <ul>
              <li><a href="../cadastrar/cad_cliente.php">Cliente</a></li>
              <li><a href="../cadastrar/cad_gerente.php">Gerente</a></li>
              <li><a href="../cadastrar/cad_administrador.php">Administrador</a></li>
            </ul>
          </li>
          <li><a href="">Listar</a>
            <ul>
              <li><a href="../listar/listar_clientes.php">Clientes</a></li>
              <li><a href="../listar/listar_gerentes.php">Gerentes</a></li>
              <li><a href="../listar/listar_administradores.php">Administradores</a></li>
            </ul>
          </li>
          <li><a data-toggle='modal' href='#modalExemplo'>Sair</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <?php

    require "../validacao/conn.php";
    require "../validacao/verifica.php";

    $resultadoM = mysqli_query($conexao, "SELECT nome FROM usuario WHERE email = '{$_SESSION['email']}' AND senha = '{$_SESSION['senha']}'");
    $linhasM = mysqli_num_rows($resultadoM);
    for ($m = 0; $m < $linhasM; $m++) {
      $nome = mysqli_fetch_row($resultadoM);
    }

    ?>

  </main>
  <script src="../bootstrap.min.js"></script>

</body>

</html>