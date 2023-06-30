<!DOCTYPE html>
<html lang="pt-pt">
<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";
?>

<head>
    <title>Gráfico de Pratos Mais Pedidos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        canvas {
            max-width: 600px;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <canvas id="chart"></canvas>

    <script>
        $.ajax({
            url: '../Includes/maisPedidos-api.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var pratos = [];
                var quantidadePedidos = [];

                // Extrair os dados da resposta e preencher os arrays correspondentes
                for (var i = 0; i < response.length; i++) {
                    pratos.push(response[i].pratos);
                    quantidadePedidos.push(response[i].quantidade);
                }

                var ctx = document.getElementById('chart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: pratos,
                        datasets: [{
                            label: 'Quantidade de Pedidos',
                            data: quantidadePedidos,
                            backgroundColor: '#FF5F5F',
                            borderColor: '#FF5F5F',
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
    </script>
</body>

</html>