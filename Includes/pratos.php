<?php 
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";

$sql = "SELECT nome, descricao, preco, img FROM pratos WHERE id=1";
$result = mysqli_query($bd, $sql);
$row = mysqli_fetch_assoc($result);
$nome_p1 = $row['nome'];



?>