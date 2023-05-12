<!doctype html>
<html lang="pt-pt">

<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";
?>

<head>
    <title>Formas de Pagamento</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
</style>

<?php

if (isset($_POST["FP1"])) {
    $valor1 = 1;
} else {
    $valor = 0;
}

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dados);

//if (isset($_POST['FP1']) && isset($_POST['FP2']) && isset($_POST['FP3'])) {
    //Obter o valor enviado pelo usuário
    //$pag1 = $_POST['FP1'];
    //$pag2 = $_POST['FP2'];
    //$pag3 = $_POST['FP3'];

    //Inserir o valor na tabela
    //$sql = "UPDATE pagamento SET fp1='$pag1', fp2='$pag2', fp3='$pag3' WHERE id=1";
    //mysqli_query($bd, $sql);
//}

//Obter o último valor inserido na tabela
//$sql = "SELECT fp1, fp2, fp3 FROM pagamento WHERE id=1";
//$result = mysqli_query($bd, $sql);
//$row = mysqli_fetch_assoc($result);
//$forma1 = $row['fp1'];
//$forma2 = $row['fp2'];
//$forma3 = $row['fp3'];

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
                <div class="justify-content-center align-items-center text-center">
                    <form action="" method="POST" class="FuncForm">
                        <h3 class="text-center">Formas de Pagamento</h3>
                        <div class="p-1">
                            Pagamento X
                            <?php 
                            if ($valor1 = 1){
                                echo ("<label class='switch'> <input type='checkbox' name='FP1' value='$valor1' checked> <span class='slider round'></span>
                            </label>");
                            } else{
                                echo ("<label class='switch'> <input type='checkbox' name='FP1' value='$valor1'> <span class='slider round'></span>
                            </label>");
                            }
                            
                            ?>
                            <br><br>
                            Pagamento Y
                            <label class="switch"> <input type="checkbox" name="FP2" value=""> <span class="slider round"></span>
                            </label>
                            <br><br>
                            Pagamento Z
                            <label class="switch"> <input type="checkbox" name="FP3" value=""> <span class="slider round"></span>
                            </label>
                            <br><br>
                            <input class="FuncForm_submit zoom border border-2 border-danger" type="submit" value="Guardar" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>

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