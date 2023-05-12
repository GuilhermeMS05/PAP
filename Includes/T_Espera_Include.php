<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";

$sql = "SELECT t_min, t_max FROM t_espera WHERE id=1";
$result = mysqli_query($bd, $sql);
$row = mysqli_fetch_assoc($result);
$valor_min = $row['t_min'];
$valor_max = $row['t_max'];
?>