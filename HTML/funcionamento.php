<!doctype html>
<html lang="pt-pt">

<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";
date_default_timezone_set('Europe/Lisbon');
?>

<head>
  <title>Tempo de Funcionamento</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="icon" type="image/png" href="../Imagens/RestaurantLogoRed.svg" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>

<style>
</style>

<body>
  <header>
    <?php
    include_once "../Navbar-Footer/navbar.php";
    ?>
  </header>
  <main>
    <?php if (is_admin()) : ?>
      <!-- Segunda-Feira -->
      <?php
      if (isset($_POST['segundaA']) && isset($_POST['segundaF'])) {
        // Obter o valor enviado pelo usuário
        $segA = $_POST['segundaA'];
        $segF = $_POST['segundaF'];

        // Inserir o valor na tabela
        $sql = "UPDATE funcionamento SET abertura='$segA', fechamento='$segF' WHERE id=1";
        mysqli_query($bd, $sql);
      }

      // Obter o último valor inserido na tabela
      $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=1";
      $result = mysqli_query($bd, $sql);
      $row = mysqli_fetch_assoc($result);
      $abertura = $row['abertura'];
      $fechamento = $row['fechamento'];
      ?>
      <div class="container p-5">
        <div class="row">
          <div class="col">
            <form action="" method="POST" class="FuncForm">
              <div class="p-1">
                Segunda-Feira:<br>
                <div style="text-align: center;">
                  <input type="time" name="segundaA" value="<?php echo $abertura ?>" required>
                  &nbspAté&nbsp
                  <input type="time" name="segundaF" value="<?php echo $fechamento ?>" required><br><br>
                  <input class="FuncForm_submit zoom border border-2 border-danger" type="submit" value="Guardar" name="submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Terça-Feira -->
      <?php
      if (isset($_POST['tercaA']) && isset($_POST['tercaF'])) {
        // Obter o valor enviado pelo usuário
        $terA = $_POST['tercaA'];
        $terF = $_POST['tercaF'];

        // Inserir o valor na tabela
        $sql = "UPDATE funcionamento SET abertura='$terA', fechamento='$terF' WHERE id=2";
        mysqli_query($bd, $sql);
      }

      // Obter o último valor inserido na tabela
      $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=2";
      $result = mysqli_query($bd, $sql);
      $row = mysqli_fetch_assoc($result);
      $abertura = $row['abertura'];
      $fechamento = $row['fechamento'];
      ?>
      <div class="container p-5">
        <div class="row">
          <div class="col">
            <form action="" method="POST" class="FuncForm">
              <div class="p-1">
                Terça-Feira:<br>
                <div style="text-align: center;">
                  <input type="time" name="tercaA" value="<?php echo $abertura ?>" required>
                  &nbspAté&nbsp
                  <input type="time" name="tercaF" value="<?php echo $fechamento ?>" required><br><br>
                  <input class="FuncForm_submit zoom border border-2 border-danger" type="submit" value="Guardar" name="submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Quarta-Feira -->
      <?php
      if (isset($_POST['quartaA']) && isset($_POST['quartaF'])) {
        // Obter o valor enviado pelo usuário
        $quaA = $_POST['quartaA'];
        $quaF = $_POST['quartaF'];

        // Inserir o valor na tabela
        $sql = "UPDATE funcionamento SET abertura='$quaA', fechamento='$quaF' WHERE id=3";
        mysqli_query($bd, $sql);
      }

      // Obter o último valor inserido na tabela
      $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=3";
      $result = mysqli_query($bd, $sql);
      $row = mysqli_fetch_assoc($result);
      $abertura = $row['abertura'];
      $fechamento = $row['fechamento'];
      ?>
      <div class="container p-5">
        <div class="row">
          <div class="col">
            <form action="" method="POST" class="FuncForm">
              <div class="p-1">
                Quarta-Feira:<br>
                <div style="text-align: center;">
                  <input type="time" name="quartaA" value="<?php echo $abertura ?>" required>
                  &nbspAté&nbsp
                  <input type="time" name="quartaF" value="<?php echo $fechamento ?>" required><br><br>
                  <input class="FuncForm_submit zoom border border-2 border-danger" type="submit" value="Guardar" name="submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Quinta-Feira -->
      <?php
      if (isset($_POST['quintaA']) && isset($_POST['quintaF'])) {
        // Obter o valor enviado pelo usuário
        $quiA = $_POST['quintaA'];
        $quiF = $_POST['quintaF'];

        // Inserir o valor na tabela
        $sql = "UPDATE funcionamento SET abertura='$quiA', fechamento='$quiF' WHERE id=4";
        mysqli_query($bd, $sql);
      }

      // Obter o último valor inserido na tabela
      $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=4";
      $result = mysqli_query($bd, $sql);
      $row = mysqli_fetch_assoc($result);
      $abertura = $row['abertura'];
      $fechamento = $row['fechamento'];
      ?>
      <div class="container p-5">
        <div class="row">
          <div class="col">
            <form action="" method="POST" class="FuncForm">
              <div class="p-1">
                Quinta-Feira:<br>
                <div style="text-align: center;">
                  <input type="time" name="quintaA" value="<?php echo $abertura ?>" required>
                  &nbspAté&nbsp
                  <input type="time" name="quintaF" value="<?php echo $fechamento ?>" required><br><br>
                  <input class="FuncForm_submit zoom border border-2 border-danger" type="submit" value="Guardar" name="submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Sexta-Feira -->
      <?php
      if (isset($_POST['sextaA']) && isset($_POST['sextaF'])) {
        // Obter o valor enviado pelo usuário
        $sexA = $_POST['sextaA'];
        $sexF = $_POST['sextaF'];

        // Inserir o valor na tabela
        $sql = "UPDATE funcionamento SET abertura='$sexA', fechamento='$sexF' WHERE id=5";
        mysqli_query($bd, $sql);
      }

      // Obter o último valor inserido na tabela
      $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=5";
      $result = mysqli_query($bd, $sql);
      $row = mysqli_fetch_assoc($result);
      $abertura = $row['abertura'];
      $fechamento = $row['fechamento'];
      ?>
      <div class="container p-5">
        <div class="row">
          <div class="col">
            <form action="" method="POST" class="FuncForm">
              <div class="p-1">
                Sexta-Feira:<br>
                <div style="text-align: center;">
                  <input type="time" name="sextaA" value="<?php echo $abertura ?>" required>
                  &nbspAté&nbsp
                  <input type="time" name="sextaF" value="<?php echo $fechamento ?>" required><br><br>
                  <input class="FuncForm_submit zoom border border-2 border-danger" type="submit" value="Guardar" name="submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Sábado -->
      <?php
      if (isset($_POST['sabadoA']) && isset($_POST['sabadoF'])) {
        // Obter o valor enviado pelo usuário
        $sabA = $_POST['sabadoA'];
        $sabF = $_POST['sabadoF'];

        // Inserir o valor na tabela
        $sql = "UPDATE funcionamento SET abertura='$sabA', fechamento='$sabF' WHERE id=6";
        mysqli_query($bd, $sql);
      }

      // Obter o último valor inserido na tabela
      $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=6";
      $result = mysqli_query($bd, $sql);
      $row = mysqli_fetch_assoc($result);
      $abertura = $row['abertura'];
      $fechamento = $row['fechamento'];
      ?>
      <div class="container p-5">
        <div class="row">
          <div class="col">
            <form action="" method="POST" class="FuncForm">
              <div class="p-1">
                Sábado:<br>
                <div style="text-align: center;">
                  <input type="time" name="sabadoA" value="<?php echo $abertura ?>" required>
                  &nbspAté&nbsp
                  <input type="time" name="sabadoF" value="<?php echo $fechamento ?>" required><br><br>
                  <input class="FuncForm_submit zoom border border-2 border-danger" type="submit" value="Guardar" name="submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Domingo -->
      <?php
      if (isset($_POST['domingoA']) && isset($_POST['domingoF'])) {
        // Obter o valor enviado pelo usuário
        $domA = $_POST['domingoA'];
        $domF = $_POST['domingoF'];

        // Inserir o valor na tabela
        $sql = "UPDATE funcionamento SET abertura='$domA', fechamento='$domF' WHERE id=7";
        mysqli_query($bd, $sql);
      }

      // Obter o último valor inserido na tabela
      $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=7";
      $result = mysqli_query($bd, $sql);
      $row = mysqli_fetch_assoc($result);
      $abertura = $row['abertura'];
      $fechamento = $row['fechamento'];
      ?>
      <div class="container p-5">
        <div class="row">
          <div class="col">
            <form action="" method="POST" class="FuncForm">
              <div class="p-1">
                Domingo:<br>
                <div style="text-align: center;">
                  <input type="time" name="domingoA" value="<?php echo $abertura ?>" required>
                  &nbspAté&nbsp
                  <input type="time" name="domingoF" value="<?php echo $fechamento ?>" required><br><br>
                  <input class="FuncForm_submit zoom border border-2 border-danger" type="submit" value="Guardar" name="submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php else : ?>
      <div class="container p-5">
        <div class="row IndexBox">
          <div class="col">
            <div class="d-flex align-items-center justify-content-center" style="height: 250px;">
              <h4><?php
                  header('refresh:4;url=index.php');
                  echo msg_erro('Esta página destina-se apenas a Administradores! A redirecionar-te para a página inicial.');
                  ?></h4>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </main>
  <footer>
    <?php
    include_once "../Navbar-Footer/footer.php";
    ?>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>