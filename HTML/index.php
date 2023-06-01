<!doctype html>
<html lang="pt-pt">

<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";
require_once "../Includes/T_Espera_Include.php";
require_once "../Includes/funcionamento_Include.php";
require_once "../Includes/pratos.php";
?>

<head>
    <title>Restaurant Name</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
                <div class="row" style="width: 100%;">
                    <div class="col-md-4">
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
                                echo "<div class='card-body'>";
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
                                echo "<button type='button' class='btn btn-secondary' id='fechar-card'>Fechar</button>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            } else {
                                echo "<a class='nav-link active m-1' id='botao' aria-current='page' href='#' onclick='mostrarCard()'> <img src='../Imagens/red.svg' alt='openimg' height='20px'> <br> Fechado</a>";
                                echo "<div id='darken-bg' class='darken-bg'>";
                                echo "<div class='card d-none card-caixa' id='card-caixa' id='darken-bg'>";
                                echo "<div class='card-body'>";
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
                                echo "<button type='button' class='btn btn-secondary' id='fechar-card'>Fechar</button>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        ?>
                    </div>
                    <div class="col-md-4">
                        <?php
                        if (is_admin()) {
                            echo "<a class='nav-link active' aria-current='page' href='T_espera.php'> <img src='../Imagens/tempodeespera.svg' alt='TempoDeEspera' height='20px'> <br> $valor_min-$valor_max min </a>";
                        } else {
                            echo "<a class='nav-link active' id='botaoTP' aria-current='page' href='#' onclick='mostrarCardTP()'> <img src='../Imagens/tempodeespera.svg' alt='TempoDeEspera' height='20px'> <br> $valor_min-$valor_max min </a>";
                            echo "<div id='darken-bgTP' class='darken-bg'>";
                            echo "<div class='card d-none card-caixa' id='card-caixaTP' id='darken-bgTP'>";
                            echo "<div class='card-body'>";
                            echo "<h5 class='card-title'><strong>Tempo de Espera</strong></h5>";
                            echo "<p>O seu pedido pode demorar em media $valor_min à $valor_max minutos para chegar em sua casa.</p>";
                            echo "<button type='button' class='btn btn-secondary' id='fechar-cardTP'>Fechar</button>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="col-md-4">
                        <?php
                        if (is_admin()) {
                            echo "<a class='nav-link active m-1' aria-current='page' href='Formas_Pagamento.php'> <img src='../Imagens/payment.svg' alt='FormasPagamento' height='20px'> <br> Formas de Pagamento</a>";
                        } else {
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </div>
        <!--
    <div class="container">
      <div class="row">
        <div class="row-md-12">
          <table class="tabelas">
            <?php
            //$procura = $bd->query("SELECT * FROM pratos");
            //if (!$procura) {
            //echo "<tr><td>Infelizmente a procura deu erro</td></tr>;";
            //} else {
            //if ($procura->num_rows == 0) {
            //echo "<tr><td>Nenhum registo encontrado!</td></tr>";
            //} else {
            //while ($reg = $procura->fetch_object()) {
            //$img = images($reg->img);
            //echo "<tr><td>$reg->nome<td>$reg->descricao<td>$reg->preco<td><img class='imagem' src='$img'>";
            //}
            //}
            //}
            ?>

          </table>
        </div>
      </div>
    </div> -->

        <div class="container-fluid p-5">
            <div class="row mx-auto IndexBox">
                <div class="Pratos mx-auto">
                    <div style="text-align: right;">
                        <select id="menu" onchange="mostrarInformacoes()">
                            <option value="">Filtrar</option>
                            <option value="entradas">Entradas</option>
                            <option value="pratos">Pratos</option>
                            <option value="sobremesas">Sobremesas</option>
                        </select>
                    </div>
                    <h2 class="text-center py-1">Menu</h2>
                    <div class="album py-5">
                        <div class="container">
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
                                    <?php $img = images($item->img); ?>
                                    <div class="col" id="informações">
                                        <div class="card shadow-sm" id="pratos" class="info">
                                            <img src="<?php echo $img ?>" class="img-fluid cardImg">
                                            <div class="card-body">
                                                <p class="card-text" style="height: 75px;"><?php echo $item->nome ?></p>
                                                <p class="desc_prato"> <?php echo $item->descricao ?></p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                                    </div>
                                                    <small class="text-muted"><?php echo $item->preco ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
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
                                    <?php $img = images($item->img); ?>
                                    <div class="col" id="informações">
                                        <div class="card shadow-sm" id="pratos" class="info">
                                            <img src="<?php echo $img ?>" class="img-fluid cardImg">
                                            <div class="card-body">
                                                <p class="card-text" style="height: 75px;"><?php echo $item->nome ?></p>
                                                <p class="desc_prato"> <?php echo $item->descricao ?></p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                                    </div>
                                                    <small class="text-muted"><?php echo $item->preco ?></small>
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




    </main>
    <footer>
        <?php
        include_once "../Navbar-Footer/footer.php";
        ?>
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
        document.getElementById("fechar-card").addEventListener("click", function () {
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

    <script>
        //Card Funcionamento
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

        //Card Tempo de Espera
        function mostrarCardTP() {
            var card = document.getElementById("card-caixaTP");
            var botao = document.getElementById("botaoTP");
            var darkenBg = document.getElementById("darken-bgTP");
            card.classList.toggle("d-none");
            card.classList.toggle("show");
            darkenBg.classList.toggle("show");
        }
        document.getElementById("fechar-cardTP").addEventListener("click", function() {
            var card = document.getElementById("card-caixaTP");
            card.classList.add("d-none");
            document.getElementById("darken-bgTP").classList.remove("show");
        });
    </script>

    <?php
    $bd->close();
    ?>
</body>

</html>