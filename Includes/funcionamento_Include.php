<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";

$dia_da_semana = date('l');
// Segunda
$sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=1";
$result = mysqli_query($bd, $sql);
$row = mysqli_fetch_assoc($result);
$segA = $row['abertura'];
$segF = $row['fechamento'];
// Terça
$sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=2";
$result = mysqli_query($bd, $sql);
$row = mysqli_fetch_assoc($result);
$terA = $row['abertura'];
$terF = $row['fechamento'];
// Quarta
$sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=3";
$result = mysqli_query($bd, $sql);
$row = mysqli_fetch_assoc($result);
$quaA = $row['abertura'];
$quaF = $row['fechamento'];
// Quinta
$sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=4";
$result = mysqli_query($bd, $sql);
$row = mysqli_fetch_assoc($result);
$quiA = $row['abertura'];
$quiF = $row['fechamento'];
// Sexta
$sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=5";
$result = mysqli_query($bd, $sql);
$row = mysqli_fetch_assoc($result);
$sexA = $row['abertura'];
$sexF = $row['fechamento'];
// Sábado
$sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=6";
$result = mysqli_query($bd, $sql);
$row = mysqli_fetch_assoc($result);
$sabA = $row['abertura'];
$sabF = $row['fechamento'];
// Domingo
$sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=7";
$result = mysqli_query($bd, $sql);
$row = mysqli_fetch_assoc($result);
$domA = $row['abertura'];
$domF = $row['fechamento'];

switch ($dia_da_semana) {
    case 'Monday':
        $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=1";
        $result = mysqli_query($bd, $sql);
        $row = mysqli_fetch_assoc($result);
        $abertura = $row['abertura'];
        $fechamento = $row['fechamento'];
        
        $hora_atual = date('H:i');
      break;
    case 'Tuesday':
        $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=2";
        $result = mysqli_query($bd, $sql);
        $row = mysqli_fetch_assoc($result);
        $abertura = $row['abertura'];
        $fechamento = $row['fechamento'];
        
        $hora_atual = date('H:i');
      break;
    case 'Wednesday':
        $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=3";
        $result = mysqli_query($bd, $sql);
        $row = mysqli_fetch_assoc($result);
        $abertura = $row['abertura'];
        $fechamento = $row['fechamento'];
        
        $hora_atual = date('H:i');
      break;
    case 'Thursday':
        $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=4";
        $result = mysqli_query($bd, $sql);
        $row = mysqli_fetch_assoc($result);
        $abertura = $row['abertura'];
        $fechamento = $row['fechamento'];
        
        $hora_atual = date('H:i');
      break;
    case 'Friday':
        $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=5";
        $result = mysqli_query($bd, $sql);
        $row = mysqli_fetch_assoc($result);
        $abertura = $row['abertura'];
        $fechamento = $row['fechamento'];
        
        $hora_atual = date('H:i');
      break;
    case 'Saturday':
        $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=6";
        $result = mysqli_query($bd, $sql);
        $row = mysqli_fetch_assoc($result);
        $abertura = $row['abertura'];
        $fechamento = $row['fechamento'];
        
        $hora_atual = date('H:i');
      break;
    case 'Sunday':
        $sql = "SELECT abertura, fechamento FROM funcionamento WHERE id=7";
        $result = mysqli_query($bd, $sql);
        $row = mysqli_fetch_assoc($result);
        $abertura = $row['abertura'];
        $fechamento = $row['fechamento'];
        
        $hora_atual = date('H:i');
      break;
    default:
      echo "Não foi possível determinar o dia da semana.";
      break;
  }

?>