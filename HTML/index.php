<!doctype html>
<html lang="pt-pt">

<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";
require_once "../Includes/T_Espera_Include.php";
require_once "../Includes/funcionamento_Include.php";
require_once "../Includes/pratos.php";

//autoload do composer
require '../vendor/autoload.php';

if ($_SESSION['nome'] == "") {
    $user = 0;
} else {
    $user = $_SESSION['nome'];
}

//Pegar infos do Google Login
$info = \App\User::getInfo();
?>

<head>
    <title>FoodManage</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" type="image/png" href="../Imagens/RestaurantLogoRed.svg" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <style>
        .info {
            display: none;
            /* Esconde as informações por padrão */
        }

        .desc_prato {
            height: 150px;
            max-height: 150;
        }
    </style>
</head>

<body>
    <header>
        <?php
        include_once "../Navbar-Footer/navbar.php";
        ?>
    </header>
    <main>
        <div class="container-fluid p-5">
            <nav class="navbar navbar-light mx-auto IndexBox">
                <div class="row text-center" style="width: 100%; vertical-align: middle;">
                    <div class="col-md-6">
                        <?php
                        if (is_admin()) {
                            if ($abertura <= $hora_atual && $hora_atual <= $fechamento) {
                                echo "<a class='nav-link active m-1' aria-current='page' href='../HTML/funcionamento.php'> <img src='../Imagens/green.svg' alt='openimg' height='20px'> <br> Aberto</a>";
                            } else {
                                echo "<a class='nav-link active m-1' aria-current='page' href='../HTML/funcionamento.php'> <img src='../Imagens/red.svg' alt='openimg' height='20px'> <br> Fechado</a>";
                            }
                        } else {
                            if ($abertura <= $hora_atual && $hora_atual <= $fechamento) {
                                echo "<a class='nav-link active m-1' aria-current='page' href='#' onclick='mostrarCard()'> <img src='../Imagens/green.svg' alt='openimg' height='20px'> <br> Aberto</a>";
                                echo "<div id='darken-bg' class='darken-bg'>";
                                echo "<div class='card d-none card-caixa' id='card-caixa' id='darken-bg'>";
                                echo "<div class='card-body my-4'>";
                                echo "<h5 class='card-title'><strong>Horário de Funcionamento</strong></h5>";
                                echo "<ul class='list-group list-group-flush' >";
                                echo "<li class='list-group-item'><strong>Segunda-Feira:</strong> $segA - $segF </li>";
                                echo "<li class='list-group-item'><strong>Terça-Feira:</strong> $terA - $terF </li>";
                                echo "<li class='list-group-item'><strong>Quarta-Feira:</strong> $quaA - $quaF </li>";
                                echo "<li class='list-group-item'><strong>Quinta-Feira:</strong> $quiA - $quiF </li>";
                                echo "<li class='list-group-item'><strong>Sexta-Feira:</strong> $sexA - $sexF </li>";
                                echo "<li class='list-group-item'><strong>Sábado:</strong> $sabA - $sabF </li>";
                                echo "<li class='list-group-item'><strong>Domingo:</strong> $domA - $domF </li>";
                                echo "</ul>";
                                echo "<button type='button' class='btn border border-2 border-danger' id='fechar-card'>Fechar</button>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            } else {
                                echo "<a class='nav-link active m-1' id='botao' aria-current='page' href='#' onclick='mostrarCard()'> <img src='../Imagens/red.svg' alt='openimg' height='20px'> <br> Fechado</a>";
                                echo "<div id='darken-bg' class='darken-bg'>";
                                echo "<div class='card d-none card-caixa' id='card-caixa' id='darken-bg'>";
                                echo "<div class='card-body my-auto'>";
                                echo "<h5 class='card-title'><strong>Horário de Funcionamento</strong></h5>";
                                echo "<ul class='list-group list-group-flush' >";
                                echo "<li class='list-group-item'><strong>Segunda-Feira:</strong> $segA - $segF </li>";
                                echo "<li class='list-group-item'><strong>Terça-Feira:</strong> $terA - $terF </li>";
                                echo "<li class='list-group-item'><strong>Quarta-Feira:</strong> $quaA - $quaF </li>";
                                echo "<li class='list-group-item'><strong>Quinta-Feira:</strong> $quiA - $quiF </li>";
                                echo "<li class='list-group-item'><strong>Sexta-Feira:</strong> $sexA - $sexF </li>";
                                echo "<li class='list-group-item'><strong>Sábado:</strong> $sabA - $sabF </li>";
                                echo "<li class='list-group-item'><strong>Domingo:</strong> $domA - $domF </li>";
                                echo "</ul>";
                                echo "<button type='button' class='btn border border-2 border-danger' id='fechar-card'>Fechar</button>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        if (is_admin()) {
                            echo "<a class='nav-link active m-1' style='vertical-align: middle;' aria-current='page' href='T_espera.php'> <img src='../Imagens/tempodeespera.svg' alt='TempoDeEspera' height='20px'> <br> $valor_min-$valor_max min </a>";
                        } else {
                            echo "<a class='nav-link active m-1' id='botaoTP' aria-current='page' href='#' onclick='mostrarCardTP()'> <img src='../Imagens/tempodeespera.svg' style='vertical-align: middle;' alt='TempoDeEspera' height='20px'> <br> $valor_min-$valor_max min </a>";
                            echo "<div id='darken-bgTP' class='darken-bg'>";
                            echo "<div class='card d-none card-caixa' id='card-caixaTP' id='darken-bgTP'>";
                            echo "<div class='card-body my-auto'>";
                            echo "<h5 class='card-title'><strong>Tempo de Espera</strong></h5>";
                            echo "<p>O seu pedido pode demorar, em média, $valor_min a $valor_max minutos para chegar à sua casa.</p>";
                            echo "<button type='button' class='btn border border-2 border-danger' id='fechar-cardTP'>Fechar</button>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </div>



        <div class="container-fluid p-5">
            <div class="row mx-auto IndexBox">
                <div class="Pratos mx-auto">
                    <h2 class="text-center py-1" id="cardapio">Cardápio</h2>
                    <div style="text-align: right;">
                        <select id="menu" onchange="mostrarInformacoes()">
                            <option value="">Filtrar</option>
                            <option value="entradas">Entradas</option>
                            <option value="pratos">Pratos</option>
                            <option value="sobremesas">Sobremesas</option>
                            <option value="bebidas">Bebidas</option>
                        </select>
                    </div>
                    <div class="album py-5">
                        <div class="container" id="informacoes">
                            <div id="pratos" class="info">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
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
                                        <?php $img = images($item->img);
                                        ?>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <img src="<?php echo $img ?>" class="img-fluid cardImg">
                                                <div class="card-body">
                                                    <p class="card-text" style="height: 75px;"><?php echo $item->nome ?></p>
                                                    <p class="desc_prato"> <?php echo $item->descricao ?></p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <?php if (is_logado()) : ?>
                                                                <a href="../HTML/carrinho.php?user=<?php echo $user ?>&produto=<?php echo $item->nome ?>&price=<?php echo $item->preco ?>&img=<?php echo $img ?>"><button type="button" class="btn border border-2 border-danger">Adicionar ao Carrinho</button></a>
                                                            <?php else : ?>
                                                                <a href="../Login/user_login.php"><button type="button" class="btn border border-2 border-danger">Adicionar ao Carrinho</button></a>
                                                            <?php endif ?>
                                                        </div>
                                                        <small class="text-muted"><?php echo number_format($item->preco, 2, ',', '.') ?> €</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div><br>
                            <div id="entradas" class="info">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
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
                                        <?php $img = images($item->img)
                                        ?>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <img src="<?php echo $img ?>" class="img-fluid cardImg">
                                                <div class="card-body">
                                                    <p class="card-text" style="height: 75px;"><?php echo $item->nome ?></p>
                                                    <p class="desc_prato"> <?php echo $item->descricao ?></p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <a href="../HTML/carrinho.php?user=<?php echo $user ?>&produto=<?php echo $item->nome ?>&price=<?php echo $item->preco ?>&img=<?php echo $img ?>"><button type="button" class="btn border border-2 border-danger">Adicionar ao Carrinho</button></a>
                                                        </div>
                                                        <small class="text-muted"><?php echo number_format($item->preco, 2, ',', '.') ?> €</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div><br>
                            <div id="sobremesas" class="info">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
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
                                        <?php $img = images($item->img);
                                        ?>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <img src="<?php echo $img ?>" class="img-fluid cardImg">
                                                <div class="card-body">
                                                    <p class="card-text" style="height: 75px;"><?php echo $item->nome ?></p>
                                                    <p class="desc_prato"> <?php echo $item->descricao ?></p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <a href="../HTML/carrinho.php?user=<?php echo $user ?>&produto=<?php echo $item->nome ?>&price=<?php echo $item->preco ?>&img=<?php echo $img ?>"><button type="button" class="btn border border-2 border-danger">Adicionar ao Carrinho</button></a>
                                                        </div>
                                                        <small class="text-muted"><?php echo number_format($item->preco, 2, ',', '.') ?> €</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div><br>
                            <div id="bebidas" class="info">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
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
                                        <?php $img = images($item->img);
                                        ?>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <img src="<?php echo $img ?>" class="img-fluid cardImg">
                                                <div class="card-body">
                                                    <p class="card-text" style="height: 75px;"><?php echo $item->nome ?></p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <a href="../HTML/carrinho.php?user=<?php echo $user ?>&produto=<?php echo $item->nome ?>&price=<?php echo $item->preco ?>&img=<?php echo $img ?>"><button type="button" class="btn border border-2 border-danger">Adicionar ao Carrinho</button></a>
                                                        </div>
                                                        <small class="text-muted"><?php echo number_format($item->preco, 2, ',', '.') ?> €</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script src="../JS/FiltrarProdutos.js"></script>
        <script src="../JS/MostrarCard.js"></script>
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