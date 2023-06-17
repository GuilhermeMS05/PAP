<!doctype html>
<html lang="en">

<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";
?>

<head>
  <title>Tempo de Espera</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel="stylesheet" href="../CSS/style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>

<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";


if (isset($_POST['t_min']) && isset($_POST['t_max'])) {
  // Obter o valor enviado pelo usuário
  $min = $_POST['t_min'];
  $max = $_POST['t_max'];

  // Inserir o valor na tabela
  $sql = "UPDATE t_espera SET t_min='$min', t_max='$max' WHERE id=1";
  mysqli_query($bd, $sql);
}

// Obter o último valor inserido na tabela
$sql = "SELECT t_min, t_max FROM t_espera WHERE id=1";
$result = mysqli_query($bd, $sql);
$row = mysqli_fetch_assoc($result);
$valor_min = $row['t_min'];
$valor_max = $row['t_max'];
?>

<body>
  <header>
    <?php
    include_once "../Navbar-Footer/navbar.php";
    ?>
  </header>
  <main>
    <?php if (is_admin()) : ?>
      <div class="container p-5">
        <div class="row">
          <div class="col">
            <form action="" method="POST" class="FuncForm">
              <div class="p-1">
                <h3 align="center">Tempo de Espera</h3><br>
                <div style="text-align: center;">
                  <input type="number" name="t_min" value="<?php echo $valor_min ?>" required>
                  &nbspAté&nbsp
                  <input type="number" name="t_max" value="<?php echo $valor_max ?>" required><br><br>
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
          <h4><?php
              header('refresh:3;url=index.php');
              echo msg_erro('Esta página destina-se apenas a Administradores! A redirecionar-te para a página inicial.');
              ?></h4>
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
  <?php
  $bd->close();
  ?>
</body>

</html>