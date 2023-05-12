<!doctype html>
<html lang="en">

<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";
?>

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="../CSS/style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div id="container">
      <?php
      $u = $_GET['user'] ?? null;
      $s = $_GET['password'] ?? null;

      if (is_null($u) || is_null($s)) {
        require "login_form.php";
      } else {
        $q = "SELECT id_utilizador, nome_utilizador, nome_completo, senha, tipo_utilizador FROM utilizadores WHERE nome_utilizador = '$u' LIMIT 1";
        $procura = $bd->query($q);
        if (!$procura) {
          echo msg_erro('Falha ao aceder à base de dados');
        } else {
          if ($procura->num_rows > 0) {
            $reg = $procura->fetch_object();
            if (testarHash($s, $reg->senha)) {
              $_SESSION['user'] = $reg->nome_utilizador;
              $_SESSION['nome'] = $reg->nome_completo;
              $_SESSION['tipo'] = $reg->tipo_utilizador;
              echo "<div class='card'>";
              echo "<div class='card-body'>";
              echo msg_sucesso('Login feito com sucesso!');
              echo "Voltar para a página principal<br>";
              echo "<a href='../HTML/index.php'><span class='material-icons'>arrow_back</span></a>";
              echo "</div>";
              echo "</div>";  
            } else {
              echo "<div class='card'>";
              echo "<div class='card-body'>";
              echo msg_erro('Password Inválida!');
              echo "Fazer login novamente<br>";
              echo "<a href='../HTML/user_login.php'><span class='material-icons'>arrow_back</span></a>";
              echo "</div>";
              echo "</div>";
            }
          } else {
            echo "<div class='card'>";
            echo "<div class='card-body'>";
            echo msg_erro('O utilizador não existe!');
            echo "Fazer login novamente<br>";
            echo "<a href='../HTML/user_login.php'><span class='material-icons'>arrow_back</span></a>";
            echo "</div>";
            echo "</div>";
          }
        }
      }
      ?>

    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>