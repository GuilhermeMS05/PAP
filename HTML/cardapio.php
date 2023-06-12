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

<body>
    <header>
        <?php
        include_once "../Navbar-Footer/navbar.php";
        ?>
    </header>
    <main>
        <div class="container p-5">
            <div class="row">
                <div class="justify-content-center align-items-center text-center FuncForm">
                    <h1>Editar Cardápio</h1>
                    <div style="text-align: left;">
                        <button class="FuncForm_submit zoom border border-2 border-danger w-auto" type="button"><a style="text-decoration: none; color:black;" href="../HTML/addproduto.php">Adicionar Produto</a></button>
                    </div>
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
                                    <td style="vertical-align: middle;"><a target="_blank" href="../HTML/editarproduto.php?id=<?php echo $item->id ?>&cat=entradas"><span class="material-symbols-outlined">edit</span></a></td>
                                    <td style="vertical-align: middle;"><a target="_blank" href="../HTML/deleteproduto.php?id=<?php echo $item->id ?>&cat=entradas"><span class="material-symbols-outlined">delete</span></a></td>

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
                                    <td style="vertical-align: middle;"><a target="_blank" href="../HTML/deleteproduto.php?id=<?php echo $item->id ?>&cat=pratos"><span class="material-symbols-outlined">delete</span></a></td>

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
                                    <td style="vertical-align: middle;"><a target="_blank" href="../HTML/editarproduto.php?id=<?php echo $item->id ?>&cat=sobremesas"><span class="material-symbols-outlined">edit</span></a></td>
                                    <td style="vertical-align: middle;"><a target="_blank" href="../HTML/deleteproduto.php?id=<?php echo $item->id ?>&cat=sobremesas"><span class="material-symbols-outlined">delete</span></a></td>

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
                                    <td style="vertical-align: middle;"><a target="_blank" href="../HTML/editarproduto.php?id=<?php echo $item->id ?>&cat=bebidas"><span class="material-symbols-outlined">edit</span></a></td>
                                    <td style="vertical-align: middle;"><a target="_blank" href="../HTML/deleteproduto.php?id=<?php echo $item->id ?>&cat=bebidas"><span class="material-symbols-outlined">delete</span></a></td>

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