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

    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

</head>
<style>
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

    .file-upload {
        width: auto;
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: 4px dashed #FF5F5F;
        position: relative;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: black;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image:hover {
        background: #FF5F5F;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }
</style>

<?php
$id = $_GET['id'];
$procura = $bd->query("SELECT * FROM pedidos WHERE id = '$id'");
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
$item = $procura->fetch_object();

$procura_info = $bd->query("SELECT * FROM pedidos WHERE nome_utilizador = '$item->nome_utilizador'");

if ($procura_info && $procura_info->num_rows > 0) {
    $info_pedido = $procura_info->fetch_object();
} else {
    echo "Não foram encontrados resultados para o nome de utilizador: $item->nome_utilizador";
}

if (isset($_POST['finalizado'])) {
    $apagar_pedido = $bd->query("DELETE FROM pedidos WHERE id = ('$item->id')");
    $apagar_carrinho = $bd->query("DELETE FROM carrinho WHERE nome_utilizador = ('$item->nome_utilizador')");
    if ($apagar_pedido === TRUE && $apagar_carrinho === TRUE) {
        header('location: telaPedidos.php');
    } else {
        echo "Erro ao deletar produto! ";
    }
}

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
                    <div class="justify-content-center align-items-center text-center FuncForm">
                        <h2 class="text-center py-1">Pedido #<?php echo $item->id  ?></h2>
                        <div class="album py-5">
                            <div class="container">
                                <div class="col-md-12">
                                    <table class="table" id="product-table">
                                        <?php
                                        $carrinho = $bd->query("SELECT * FROM carrinho WHERE nome_utilizador = ('$item->nome_utilizador')");
                                        if ($carrinho && $carrinho->num_rows > 0) {
                                        } else {
                                            echo "Não foram encontrados resultados para o nome de utilizador: $item->nome_utilizador";
                                        }
                                        ?>
                                        <tr>
                                            <th scope="col" colspan="1">Imagem</th>
                                            <th scope="col" colspan="2">Nome</th>
                                            <th scope="col" colspan="1">Preço</th>
                                        </tr>
                                        <?php $valorTotal = 0;
                                        while ($produtos = $carrinho->fetch_object()) : ?>
                                            <?php $img = images($produtos->img);
                                            $valorTotal += $produtos->price;
                                            ?>
                                            <tr>
                                                <th colspan="1" scope="row"><img src="<?php echo $img ?>" class="img-fluid img"></th>
                                                <td colspan="2" style="vertical-align: middle;"><?php echo $produtos->produto ?></td>
                                                <td colspan="1" style="vertical-align: middle;"><?php echo number_format($produtos->price, 2, ',', '.') ?> €</td>

                                            </tr>
                                        <?php endwhile; ?>
                                        <tr>
                                            <th style="text-align: right;" scope="col" colspan="4">Valor Total: <?php echo number_format($valorTotal, 2, ',', '.') ?> €</th>
                                        </tr>
                                    </table><br>
                                    <h4 style="text-align: start;"><b>Dados do Cliente:</b></h4>
                                    <div class="text-start p-4">
                                        <h5><b>Nome:</b> <?php echo $item->nome_utilizador ?></h5><br>
                                        <h5><b>Morada:</b> <?php echo $info_pedido->morada ?></h5><br>
                                        <h5><b>Contacto:</b> <?php echo $info_pedido->contacto ?></h5><br>
                                        <?php if($info_pedido->nif == 1){
                                            $info_pedido->nif = NULL;
                                        } ?>
                                        <h5><b>NIF:</b> <?php echo $info_pedido->nif ?></h5><br>
                                        <h5><b>Observações:</b> <?php echo $info_pedido->observacoes ?></h5><br>
                                    </div>
                                    <form action="" method="POST">
                                        <button type="submit" name="finalizado" class="btn FuncForm_submit zoom border border-2 border-danger">Pedido Finalizado</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="container">
                <div class="row IndexBox">
                    <h4><?php
                        header('refresh:3;url=index.php');
                        echo msg_erro('Esta página destina-se apenas a Administradores! A redirecionar-te para a página inicial.');
                        ?></h4>
                </div>
            </div>

        <?php endif; ?>
    </main>
    <script src="../JS/AddProdutoImg.js"></script>
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
</body>

</html>