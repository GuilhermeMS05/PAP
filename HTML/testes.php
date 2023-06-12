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
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .filter-btn {
      margin-right: 10px;
    }

    .img {
        width: 90px;
        height: 55px;
        border-radius: 5px;
    }
  </style>

</head>

<body>
  <header>
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand mb-0 h1" href="../HTML/index.php"> <img src="../Imagens/RestaurantName.svg" alt="logo_restaurante" width="100px" height="100px"> </a>
        <li class='navbar'>
          <a class='nav-link active' aria-current='page' href='../Login/user_login.php'> <img src='../Imagens/imglogin.png' height='30px'> </a>

      </div>
    </nav>
  </header><br>
  <main>
    <div class="container p-5">
      <div class="row">
        <div class="justify-content-center align-items-center text-center FuncForm">
          <h1>Editar Cardápio</h1>
          <div style="text-align: right;">
            <select class="filter-dropdown" onchange="filterProducts(this.value)">
              <option value="all">Todas as Opções</option>
              <option value="entrada">Entradas</option>
              <option value="prato">Pratos</option>
              <option value="sobremesa">Sobremesas</option>
              <option value="bebida">Bebidas</option>
            </select>
          </div>

          <table class="table" id="product-table">
            <div class="container album py-3">
              <tr>
                <th scope="col" colspan="1">Imagem</th>
                <th scope="col" colspan="3">Nome</th>
                <th scope="col" colspan="2">Operação</th>
              </tr>
              <?php
              $procura = $bd->query("SELECT * FROM entradas");
              if (!$procura) {
                echo "<tr><td>Infelizmente a procura deu erro</td></tr>;";
              } else {
                if ($procura->num_rows == 0) {
                  echo "<tr><td>Nenhum registo encontrado!</td></tr>";
                } else {
                  // $reg = $procura->fetch_object();
                  // $img = images($reg->img); 
                }
              }
              ?>
              <?php while ($item = $procura->fetch_object()) : ?>
                <?php $img = images($item->img); ?>
                <tr class="entrada">
                  <th scope="row"><img src="<?php echo $img ?>" class="img-fluid img"></th>
                  <td colspan="3" style="vertical-align: middle;"><?php echo $item->nome ?></td>
                  <td style="vertical-align: middle;"><a target="_blank" href="../HTML/editarproduto.php?id=<?php echo $item->id ?>&cat=pratos"><span class="material-symbols-outlined">edit</span></a></td>
                  <td style="vertical-align: middle;"><span class="material-symbols-outlined">delete</span></td>

                </tr>
              <?php endwhile; ?>
              <?php
              $procura = $bd->query("SELECT * FROM pratos");
              if (!$procura) {
                echo "<tr><td>Infelizmente a procura deu erro</td></tr>;";
              } else {
                if ($procura->num_rows == 0) {
                  echo "<tr><td>Nenhum registo encontrado!</td></tr>";
                } else {
                  // $reg = $procura->fetch_object();
                  // $img = images($reg->img); 
                }
              }
              ?>
              <?php while ($item = $procura->fetch_object()) : ?>
                <?php $img = images($item->img); ?>
                <tr class="prato">
                  <th scope="row"><img src="<?php echo $img ?>" class="img-fluid img"></th>
                  <td colspan="3" style="vertical-align: middle;"><?php echo $item->nome ?></td>
                  <td style="vertical-align: middle;"><a target="_blank" href="../HTML/editarproduto.php?id=<?php echo $item->id ?>&cat=pratos"><span class="material-symbols-outlined">edit</span></a></td>
                  <td style="vertical-align: middle;"><span class="material-symbols-outlined">delete</span></td>

                </tr>
              <?php endwhile; ?>
              <?php
              $procura = $bd->query("SELECT * FROM sobremesas");
              if (!$procura) {
                echo "<tr><td>Infelizmente a procura deu erro</td></tr>;";
              } else {
                if ($procura->num_rows == 0) {
                  echo "<tr><td>Nenhum registo encontrado!</td></tr>";
                } else {
                  // $reg = $procura->fetch_object();
                  // $img = images($reg->img); 
                }
              }
              ?>
              <?php while ($item = $procura->fetch_object()) : ?>
                <?php $img = images($item->img); ?>
                <tr class="sobremesa">
                  <th scope="row"><img src="<?php echo $img ?>" class="img-fluid img"></th>
                  <td colspan="3" style="vertical-align: middle;"><?php echo $item->nome ?></td>
                  <td style="vertical-align: middle;"><a target="_blank" href="../HTML/editarproduto.php?id=<?php echo $item->id ?>&cat=pratos"><span class="material-symbols-outlined">edit</span></a></td>
                  <td style="vertical-align: middle;"><span class="material-symbols-outlined">delete</span></td>

                </tr>
              <?php endwhile; ?>
              <?php
              $procura = $bd->query("SELECT * FROM bebidas");
              if (!$procura) {
                echo "<tr><td>Infelizmente a procura deu erro</td></tr>;";
              } else {
                if ($procura->num_rows == 0) {
                  echo "<tr><td>Nenhum registo encontrado!</td></tr>";
                } else {
                  // $reg = $procura->fetch_object();
                  // $img = images($reg->img); 
                }
              }
              ?>
              <?php while ($item = $procura->fetch_object()) : ?>
                <?php $img = images($item->img); ?>
                <tr class="bebida">
                  <th scope="row"><img src="<?php echo $img ?>" class="img-fluid img"></th>
                  <td colspan="3" style="vertical-align: middle;"><?php echo $item->nome ?></td>
                  <td style="vertical-align: middle;"><a target="_blank" href="../HTML/editarproduto.php?id=<?php echo $item->id ?>&cat=pratos"><span class="material-symbols-outlined">edit</span></a></td>
                  <td style="vertical-align: middle;"><span class="material-symbols-outlined">delete</span></td>

                </tr>
              <?php endwhile; ?>
            </div>
          </table>
        </div>
      </div>
    </div>
    <script>
      function filterProducts(type) {
        var rows = document.getElementById("product-table").getElementsByTagName("tr");
        for (var i = 1; i < rows.length; i++) {
          var row = rows[i];
          if (type === "all" || row.classList.contains(type)) {
            row.style.display = "";
          } else {
            row.style.display = "none";
          }
        }
      }
    </script>
</body>

</html>
</body>

</html>

</html>
<footer>
  something here
</footer>

<script>
  function mostrarCard() {
    var card = document.getElementById("card-caixa");
    var botao = document.getElementById("botao");
    var darkenBg = document.getElementById("darken-bg");
    card.classList.toggle("d-none");
    card.classList.toggle("show");
    darkenBg.classList.toggle("show");
  }
  document.getElementById("fechar-card").addEventListener("click", function() {
    var card = document.getElementById("card-caixa");
    card.classList.add("d-none");
    document.getElementById("darken-bg").classList.remove("show");
  });
</script>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
</body>

</html>