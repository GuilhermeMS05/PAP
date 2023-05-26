<?php
$servername = "guilhermepap.mysql.database.azure.com";
$username = "Guilherme_PAP";
$password = "7nZ4@3MB";
$database = "guilherme_pap";

// Cria conexão com SSL
$bd = mysqli_init();
mysqli_ssl_set($bd, NULL, NULL, NULL, NULL, NULL);
mysqli_real_connect($bd, $servername, $username, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL);

// Verifica conexão
if (!$bd) {
  die("Conexão falhou: " . mysqli_connect_error());
}
$bd->set_charset('utf8');
?>