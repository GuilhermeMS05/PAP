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
</style>

<?php
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dados);

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["opcao1"]) && is_array($_POST["opcao1"])) {
        $opcoes = $_POST["opcao1"];
        // Obtém os valores selecionados dos checkboxes
        if (isset($_POST["opcao1"])) {
            $opcoes = $_POST["opcao1"];

            // Limpa a tabela antes de inserir novos valores
            $sqlLimpar = "TRUNCATE TABLE pagamento";
            $bd->query($sqlLimpar);

            // Insere os valores no banco de dados
            foreach ($opcoes as $opcao) {
                $sql = "INSERT INTO pagamento (opcao) VALUES ('$opcao')";
                if ($bd->query($sql) !== TRUE) {
                    echo "Erro ao salvar no banco de dados: " . $bd->error;
                }
            }

            echo "Valores salvos no banco de dados com sucesso.";
        }
    }
}
// Recupera os valores do banco de dados
$sql = "SELECT opcao FROM pagamento";
$result = $bd->query($sql);

$opcoesSelecionadas = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $opcoesSelecionadas[] = $row["opcao"];
    }
}

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
        <?php if (is_admin()) : ?>
            <div class="container p-5">
                <div class="row">
                    <div class="justify-content-center align-items-center text-center">
                        <form action="" method="POST" class="FuncForm">
                            <h3 class="text-center">Formas de Pagamento</h3>
                            <div class="p-1">
                                Pagamento X
                                <label class='switch'> <input type='checkbox' name='opcao1' value="opcao1" <?php if (in_array("opcao1", $opcoesSelecionadas)) echo "checked"; ?>> <span class='slider round'></span>
                                </label>
                                <br><br>
                                Pagamento Y
                                <label class="switch"> <input type="checkbox" name="opcao2" value="opcao2" <?php if (in_array("opcao2", $opcoesSelecionadas)) echo "checked"; ?>> <span class="slider round"></span>
                                </label>
                                <br><br>
                                Pagamento Z
                                <label class="switch"> <input type="checkbox" name="opcao3" value="opcao3" <?php if (in_array("opcao3", $opcoesSelecionadas)) echo "checked"; ?>> <span class="slider round"></span>
                                </label>
                                <br><br>
                                <input class="FuncForm_submit zoom border border-2 border-danger" type="submit" value="Guardar" name="submit">
                            </div>
                        </form>
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
    </main>
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