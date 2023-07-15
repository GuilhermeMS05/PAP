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
$tabela = $_GET['cat'];
$procura = $bd->query("SELECT * FROM $tabela WHERE id=$id");
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

if (isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['preco']) && isset($_POST['imagem'])) {
    // Obter o valor enviado pelo usuário
    $P_nome = $_POST['nome'];
    $P_desc = $_POST['descricao'];
    $P_preco = $_POST['preco'];
    $P_img = $_POST['imagem'];

    // Inserir o valor na tabela
    $sql = "UPDATE $tabela SET nome='$P_nome', descricao='$P_desc', preco='$P_preco', img='$P_img' WHERE id=$id";
    mysqli_query($bd, $sql);
    header('location: cardapio.php');
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
        <?php if (is_admin()) : ?>
            <div class="container p-5">
                <div class="row">
                    <div class="justify-content-center align-items-center text-center FuncForm">
                        <h2 class="text-center py-1"><?php $item = $procura->fetch_object();
                                                        echo "Editar $item->nome"; ?></h2>

                        <div class="album py-5">
                            <div class="container">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-12 g-3 d-flex justify-content-center">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nome do Produto</label>
                                            <input type="text" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $item->nome ?>">
                                        </div><br>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Descrição do Produto</label>
                                            <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3"><?php echo $item->descricao ?></textarea>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Preço do Produto</label>
                                            <input type="text" class="form-control" name="preco" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $item->preco ?>">
                                        </div><br>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Imagem do Produto</label>
                                            <div class="file-upload">
                                                <div class="image-upload-wrap zoom">
                                                    <input class="file-upload-input" name="imagem" type='file' onchange="readURL(this);" accept="image/*" />
                                                    <div class="drag-text">
                                                        <h3>Adicionar Imagem</h3>
                                                    </div>
                                                </div>
                                                <div class="file-upload-content">
                                                    <img class="file-upload-image" src="../Imagens/<?php $img = images($item->img);
                                                                                                    echo $item->img ?>" alt="your image" />
                                                    <div class="image-title-wrap">
                                                        <button type="button" onclick="removeUpload()" class="FuncForm_submit zoom border border-2 border-danger remove-image">Remover Imagem</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>
                                        <button type="submit" class="btn FuncForm_submit zoom border border-2 border-danger">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="container p-5">
                <div class="row IndexBox">
                    <h4><?php
                        header('refresh:4;url=index.php');
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