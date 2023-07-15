<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand mb-0 h1" href="../HTML/index.php"> <img src="../Imagens/RestaurantLogoRed.svg" alt="logo_restaurante" width="100px" height="100px"> </a>
    <?php
    if ($_SESSION['user'] == "") {
      echo "<li class='navbar'>";
      echo "<a class='nav-link active' aria-current='page' href='../Login/user_login.php'> <img src='../Imagens/imglogin.png' height='30px'> </a>";
      echo "</li>";
    } else {
      if (is_admin()) {
        echo "<li class='navbar dropdown'> <a class='nav-link dropdown-toggle active' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-current='page' aria-expanded='false' href='#'>Registos</a>";
        echo "<ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
        echo "<li><a class='dropdown-item' href='../HTML/funcionamento.php'>Horário de Funcionamento</a></li>";
        echo "<li><a class='dropdown-item' href='../HTML/T_Espera.php'>Tempo de Espera</a></li>";
        echo "<li><a class='dropdown-item' href='../HTML/cardapio.php'>Editar Cardápio</a></li>";
        echo "</ul></li>";
        echo "<li class='navbar'> <a class='nav-link active' aria-current='page' href='../HTML/telaPedidos.php'>Pedidos</a></li>";
        echo "<li class='navbar dropdown'> <a class='nav-link dropdown-toggle active' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-current='page' href='#'>Relatórios</a>";
        echo "<ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
        echo "<li><a class='dropdown-item' href='../Graficos/faturacao.php'>Faturação por dia</a></li>";
        echo "<li><a class='dropdown-item' href='../Graficos/maisPedidos.php'>Pratos mais Pedidos</a></li>";
        echo "</ul></li>";
      }
      echo "<li class='navbar'>";
      if (!empty($_SESSION['nome'])) {
        echo "Olá,&nbsp<strong>" . $_SESSION['nome'] . "</strong>&nbsp|";
      } else {
        echo "Olá,&nbsp<strong>" . $info['name'] . "</strong>&nbsp|";
      }
      echo "<a class='nav-link active' aria-current='page' href='../Login/user_logout.php'> <img src='../imagens/imglogout.png' height='30px'> </a>";
      echo "</li>";
    }
    ?>
  </div>
</nav>