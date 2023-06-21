<?php
$user = $_GET['user'];
$produto = $_GET['produto'];
$price = $_GET['price'];
$imagem = $_GET['img'];

// Realize a operação desejada no banco de dados
$sql = "INSERT INTO carrinho (nome_utilizador, produto, price, img) VALUES ('$user', '$produto', '$price', '$imagem')";
mysqli_query($bd, $sql);

// Redirecione para outra página após a operação ser concluída
$url = "carrinho.php?user=$user&produto=$produto&price=$price&img=$imagem";
header('Location: ' . $url);
exit();
?>