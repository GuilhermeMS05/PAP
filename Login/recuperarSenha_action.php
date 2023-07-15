<!doctype html>
<html lang="en">

<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";
?>

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/png" href="../Imagens/RestaurantLogoRed.svg"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div id="container">
            <?php
            if (
                isset($_POST['user']) && // se existe o nome no post
                isset($_POST['password']) && // se existe a password no post
                isset($_POST['password_r']) && // se existe a password_repeat no post
                $_POST['password_r'] == $_POST['password']
            ) { // se a password e a password_repeat são iguais
                $user = $_POST['user'];
                $password = $_POST['password'];
                $pass_hash = gerarHash($password);
                // verificar se o user já existe na db
                $query = "UPDATE utilizadores SET senha = '$pass_hash' WHERE nome_utilizador = '$user'";
                $result = mysqli_query($bd, $query);
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo msg_sucesso('Password Recuperada!');
                echo "Entre na sua conta<br>";
                echo "<a href='../Login/user_login.php'><span class='material-icons'>arrow_back</span></a>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo msg_erro('As palavras-passe não coincidem!');
                echo "Tente novamente<br>";
                echo "<a href='../Login/recuperarSenha.php'><span class='material-icons'>arrow_back</span></a>";
                echo "</div>";
                echo "</div>";
            }
            ?>


        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>