<?php
require_once "../Includes/connect.php";
require_once "../Includes/functions.php";
require_once "../Includes/login.php";

$u = "admin";

$q = "SELECT id_utilizador, nome_utilizador, senha, tipo_utilizador FROM utilizadores WHERE nome_utilizador = '$u' LIMIT 1";
$procura = $bd->query($q);

$reg = $procura->fetch_object();
$senha = $reg->senha;

echo $senha;