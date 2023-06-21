<!doctype html>
<html lang="en">

<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";
?>

<head>
    <title>Criar Conta</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google API Library -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <!-- Client ID -->
    <meta name="google-signin-client_id" content="916942570766-9t489m55467gqhu2fg6s7a3hsfkcvkhs.apps.googleusercontent.com">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="../CSS/style.css">

    <style>
        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }

        .btn-google {
            color: white !important;
            background-color: #ea4335;
        }

        .btn-facebook {
            color: white !important;
            background-color: #3b5998;
        }

        input{
            background-color: #FF5F5F;
        }

        a:link {
            color: #ff0000;
            text-decoration: none;
        }
        a:hover {
            color: #FF5F5F;
            text-decoration: none;
        }
    </style>

</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-1">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title text-center mb-5 fw-light fs-5">Recuperar Password</h5>
                            <form method="post" action="recuperarSenha_action.php">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="user" required>
                                    <label for="floatingInput">Nome de Utilizador</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingInput" name="password" required>
                                    <label for="floatingInput">Nova Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingInput" name="password_r" required>
                                    <label for="floatingInput">Confirmar Nova Password</label>
                                </div>
                                <div class="d-grid">
                                    <input class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" value="Recuperar"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>