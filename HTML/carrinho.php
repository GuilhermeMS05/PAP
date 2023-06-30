<!doctype html>
<html lang="pt-pt">

<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";
?>

<head>
    <title>Carrinho</title>
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
$user = $_SESSION['nome'];
$produto = $_GET['produto'];
$price = $_GET['price'];
$imagem = $_GET['img'];

if($user != '0' && $produto != '0' && $price != '0' && $imagem != '0'){
    $sql = "INSERT INTO carrinho (nome_utilizador, produto, price, img) VALUES ('$user', '$produto', '$price', '$imagem')";
    mysqli_query($bd, $sql);
} else{
}

?>

<body>
    <header>
        <?php
        include_once "../Navbar-Footer/navbar.php";
        ?>
    </header>
    <main>
        <?php if (is_logado()) : ?>
            <div class="container p-5">
                <div class="row">
                    <?php
                    $procura = $bd->query("SELECT * FROM carrinho WHERE nome_utilizador = ('$user')");
                    if (!$procura) {
                        echo "<tr><td>Infelizmente a procura deu erro</td></tr>;";
                    } else {
                        if ($procura->num_rows == 0) {
                            
                        } else {
                            // $reg = $procura->fetch_object();
                            // $img = images($reg->img); 
                        }
                    }
                    ?>
                    <div class="justify-content-center align-items-center text-center FuncForm">
                        <h1>Carrinho</h1>
                        <table class="table" id="product-table">
                            <div class="container album py-3">
                                <tr>
                                    <th scope="col" colspan="1">Imagem</th>
                                    <th scope="col" colspan="2">Nome</th>
                                    <th scope="col" colspan="1">Preço</th>
                                    <th scope="col" colspan="2">Operação</th>
                                </tr>
                                <?php $valorTotal = 0;
                                while ($item = $procura->fetch_object()) : ?>
                                    <?php $img = images($item->img);
                                    $valorTotal += $item->price;
                                    ?>
                                    <tr>
                                        <th scope="row"><img src="<?php echo $img ?>" class="img-fluid img"></th>
                                        <td colspan="2" style="vertical-align: middle;"><?php echo $item->produto ?></td>
                                        <td colspan="1" style="vertical-align: middle;"><?php echo number_format($item->price, 2, ',', '.') ?> €</td>
                                        <td colspan="1" style="vertical-align: middle;"><a href="../HTML/addcarrinho.php?user=<?php echo $user ?>&produto=<?php echo $item->produto ?>&price=<?php echo $item->price ?>&img=<?php echo $img ?>"><span class="material-symbols-outlined">add</span></a></td>
                                        <td colspan="1" style="vertical-align: middle;"><a href="../HTML/carrinho_apagar.php?id=<?php echo $item->id ?>&user=<?php echo $user ?>"><span class="material-symbols-outlined">delete</span></a></td>

                                    </tr>
                                <?php endwhile; ?>
                                <tr>
                                    <th style="text-align: right;" scope="col" colspan="6">Valor Total: <?php echo number_format($valorTotal, 2, ',', '.') ?> €</th>
                                </tr>
                            </div>
                        </table>
                        <button class="btn border border-2 border-danger m-2" type="button"><a style="text-decoration: none;" href="../HTML/index.php#cardapio">Continuar a comprar</a></button>
                        <button class="btn border border-2 border-danger m-2" type="button"><a style="text-decoration: none; text-align: start;" href="../HTML/fazerPedido.php?user=<?php echo $user ?>">Fazer pedido</a></button>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="container p-5">
                <div class="row IndexBox">
                    <h4><?php
                        header('location: ../Login/user_login.php');
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