<?php
    $bd = new MySQLi('localhost', 'root', '', 'pap_bd');
    if($bd->connect_error){
       echo "Desconectado! Erro: " . $bd->connect_error;
       die();
    }
$bd->set_charset('utf8');
?>  