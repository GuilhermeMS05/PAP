<!doctype html>
<html lang="pt-pt">

<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";
?>

<head>
    <title>Faturação por dia</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" type="image/png" href="../Imagens/RestaurantLogoRed.svg"/>
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
                        <h2 class="text-center py-1">Faturação por dia</h2>
                        <div class="album py-5">
                            <div class="container">
                                <label for="start-date">Data Inicial:</label>
                                <input type="date" id="start-date">
                                <label for="end-date">Data Final:</label>
                                <input type="date" id="end-date">
                                <button class="btn border border-2 border-danger" onclick="generateChart()">Gerar Gráfico</button>
                                <div class="chart-container">
                                    <canvas id="chart"></canvas>
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
                        header('refresh:5;url=index.php');
                        echo msg_erro('Esta página destina-se apenas a Administradores! A redirecionar-te para a página inicial.');
                        ?></h4>
                </div>
            </div>

        <?php endif; ?>
    </main>
    <script src="../JS/phptojs.js"></script>
    <script>
        function generateChart() {
            var startDate = document.getElementById('start-date').value;
            var endDate = document.getElementById('end-date').value;

            // Fazer requisição AJAX para obter os dados da base de dados
            $.ajax({
                url: '../Includes/faturacao-api.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var dataMap = {};

                    // Agrupar os valores por dia e calcular a soma correspondente
                    for (var i = 0; i < response.length; i++) {
                        var diaAtual = response[i].dia_atual;
                        var preco = parseFloat(response[i].preco);

                        if (isDateInRange(diaAtual, startDate, endDate)) {
                            if (dataMap[diaAtual]) {
                                dataMap[diaAtual] += preco;
                            } else {
                                dataMap[diaAtual] = preco;
                            }
                        }
                    }

                    var labels = Object.keys(dataMap);
                    var data = Object.values(dataMap);

                    var ctx = document.getElementById('chart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Faturamento diário',
                                data: data,
                                borderColor: '#FF5F5F',
                                backgroundColor: '#FF5F5F',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.log('Erro na requisição AJAX:', error);
                }
            });
        }

        function isDateInRange(date, startDate, endDate) {
            var currentDate = new Date(date);
            var start = new Date(startDate);
            var end = new Date(endDate);

            start.setHours(0, 0, 0, 0);
            end.setHours(23, 59, 59, 999);

            return currentDate >= start && currentDate <= end;
        }
    </script>
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