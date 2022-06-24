<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administradores</title>

  <!-- STYLES -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../style/stylelistar.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <header id="header">
    <nav class="container">
      <a class="logo" href="../home/index.php">Games <span>Baratos</span></a>

      <!-- Menu -->
      <div class="dd-menu">
        <ul>
          <li><a href="../home/index.php">Início</a></li>
          <li><a href="../cadastrar/cad_administrador.php">Cadastrar Administrador</a></li>
          <li><a href="../listar/listar_clientes.php">Clientes</a></li>
          <li><a href="../listar/listar_gerentes.php">Gerentes</a></li>
        </ul>
        </li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <?php

    include "../validacao/conn.php";
    require "../validacao/verifica.php";

    $sql = "SELECT * FROM usuario WHERE perfil_id = 1 ORDER BY id ASC";
    $resultado = $conexao->query($sql);

    mysqli_close($conexao);
    ?>



    <!-- Modal de Exclusão de administrador -->
<div class="modal fade" id="myModalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="text-align: center;">
      <div class="modal-dialog" role="document">
        <div class="modal-content ">
          <div class="modal-header alert alert-danger" style="height: 60px;">
            <h4 class="modal-title " id="exampleModalLongTitle">Exclusão de Administrador</h2>
              <button type="button" class="close col-md-1" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
              </button>
          </div>
          <div class="modal-body">
            <h5>Administrador excluído com sucesso!</h5>
          </div>
        </div>
      </div>
    </div>

<h1>Administradores</h1>

    <div class="container py-5">
      <table class="table table-light">
        <thead>
          <tr>
            <th scope="col">Matrícula</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($user_data = mysqli_fetch_assoc($resultado)) {

            $id = $user_data['id'];
            $matricula = $user_data['matricula']; 
            $nome = $user_data['nome']; 
            $email = $user_data['email']; 
            echo "<tr>"; 
            echo "<td>".$matricula."</td>"; 
            echo "<td>".$nome."</td>"; 
            echo "<td>".$email."</td>"; 
            echo "<td> <a class = 'btn btn-sm btn-primary' href = '../alterar/alt_administrador.php?id=$user_data[id]'><i class='bi bi-pencil-square'></i> </a> </td>";
            echo "<td> <a class = 'btn btn-sm btn-primary' href=popup_adm.php?id=$id><i class='bi bi-trash''></i> </a> </td>";

            echo "</tr>";

            if (!empty($_SESSION['excluir'])) {
              echo "<script type='text/javascript'>
              $(window).on('load',function(){
              $('#myModalExcluir').modal('show'); });
          </script>";
              unset($_SESSION['excluir']);
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>
  
  <script src="../bootstrap.min.js"></script>
</body>

</html>