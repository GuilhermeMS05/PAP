<!doctype html>
<html lang="en">

<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";
?>

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="../CSS/style.css">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12-md">
                    <section class="vh-100 gradient-custom"">
          <div class=" container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                    <div class="card-body p-4 text-center">

                                        <div>
                                            <img src="../imagens/logo_branca2.svg" height="150px" alt="">
                                            <form method="get" action="user_login.php">
                                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                                <p class="text-white-50 mb-5">Por favor insira seu username e password!</p>
                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" id="user" class="form-control form-control-lg" name="user" maxlength="10" />
                                                    <label class="form-label" for="typeEmailX">Username</label>
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <input type="password" id="senha" class="form-control form-control-lg" name="password" maxlength="60" />
                                                    <label class="form-label" for="typePasswordX">Senha</label>
                                                </div>

                                                <input class="btn btn-outline-light btn-lg px-5" type="submit" value="Entrar"></input>
                                            </form>
                                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </section>
                <br><br><br><br>
            </div>
        </div>
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