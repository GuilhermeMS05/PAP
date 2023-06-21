<!doctype html>
<html lang="pt-pt">

<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";
?>

<head>
    <title>Editar Cardápio</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../Imagens/RestaurantLogoRed.svg"/>

    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>
<style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 1px;
        bottom: 0.5px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #bada55;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #bada55;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(20px);
        -ms-transform: translateX(20px);
        transform: translateX(20px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .TableStyle {
        background-color: white;
        width: 100%;
        border-collapse: collapse;
        border-radius: 5px;
        box-shadow: 5px 5px 20px black;
        position: center;
    }

    .form_submit {
        background-color: white;
        width: 200px;
        border-radius: 5px;
    }

    .img {
        width: 90px;
        height: 55px;
        border-radius: 5px;
    }

    a {
        color: black;
    }

    a:hover {
        color: #FF5F5F;
    }
</style>

<?php

?>

<body class="d-flex flex-column min-vh-100">
    <header>
        <?php
        include_once "../Navbar-Footer/navbar.php";
        ?>
    </header>
    <main class="flex-grow-1">
        <?php if (is_admin()) : ?>
            <div class="container p-5">
                <div class="row">

                    <div class="justify-content-center align-items-center text-center FuncForm">
                        <h1>Pedidos</h1>

                        <table class="table" id="product-table">
                            <div class="container album py-3">
                                <?php
                                $pedido = $bd->query("SELECT * FROM pedidos");
                                if (!$pedido) {
                                    echo "<tr><td>Infelizmente a procura deu erro</td></tr>;";
                                } else {
                                    if ($pedido->num_rows == 0) {
                                        
                                    } else {
                                        // $reg = $procura->fetch_object();
                                        // $img = images($reg->img); 
                                    }
                                }
                                ?>
                                <tr>
                                    <th scope="col" colspan="1">#</th>
                                    <th scope="col" colspan="2">Cliente</th>
                                    <th scope="col" colspan="1">Ver Pedido</th>
                                </tr>
                                <?php while ($item = $pedido->fetch_object()) : ?>
                                    <tr>
                                        <th colspan="1" style="vertical-align: middle;" scope="row">Pedido #<?php echo $item->id ?></th>
                                        <td colspan="2" style="vertical-align: middle;"><?php echo $item->nome_utilizador ?></td>
                                        <td colspan="1" style="vertical-align: middle;"><a href="../HTML/pedidos.php?id=<?php echo $item->id ?>"><button type="button" class="btn border border-2 border-danger">Ver Pedido</button></a></td>

                                    </tr>
                                <?php endwhile; ?>
                            </div>
                        </table>
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

        <script src="../JS/EditarCardápioFiltro.js"></script>
        <footer>
            <?php
            include_once "../Navbar-Footer/footer.php";
            ?>
        </footer>
        <!-- JQuery Library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>

        <script>

        </script>

</body>

</html>