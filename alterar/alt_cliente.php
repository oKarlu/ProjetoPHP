<?php
// Verificando se temos o id
if (!empty($_GET['id'])) {

  include "../validacao/conn.php";
  require "../validacao/verifica.php";

  $id = $_GET['id'];

  $sqlSelect = "SELECT * FROM cliente WHERE id = '$id'";

  $result = $conexao->query($sqlSelect);

  if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {
      $cpf         = $user_data['cpf'];
      $nome        = $user_data['nomeC'];
      $email       = $user_data['emailC'];
      $telefone    = $user_data['telefoneC'];
    }
  } else {
    header('Location: ../listar/listar_clientes.php');
  }
} else {
  header('Location: ../listar/listar_clientes.php');
}
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Clientes</title>

  <!-- Icones -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- Styles -->
  <link rel="stylesheet" href="../style/stylecadclientes.css" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>
  <main class="container">
    <!-- Form -->
    <div>
      <form method="POST" action="../alterar/editar.php">
        <div class="backtomenu">
          <a href="../listar/listar_clientes.php">Voltar</a>
          <div class="space"></div>
        </div>

        <h1 class="title-form">Editar Cliente</h1>

        <div class="input-field">
          <input class="label" type="text" name="nome" value="<?php echo $nome ?>" required />
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <div class="input-field">
          <input class="label" type="email" name="email" value="<?php echo  $email ?>" required />
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <div class="input-field">
          <input class="label" type="text" name="cpf" value="<?php echo  $cpf ?>" />
          <div class="underline"></div>
        </div>
        <div class="space"></div>

        <div class="input-field">
          <input class="label" type="tel" name="telefone" value="<?php echo  $telefone ?>" />
          <div class="underline"></div>
        </div>

        <div class="input-field">
          <input class="label" type="hidden" name="id" value="<?php echo  $id ?>" required />
        </div>

        <input class="button" type="submit" name="atualizar_cliente" value="Editar" />
      </form>
      <footer>
        <div class="footer">
          <div class="logo">
            <a class="logo logo-alt" href="../home/index.php">mecânica<span>baiano</span>.</a>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <!-- main.js -->
  <script src="main.js"></script>
</body>

</html>