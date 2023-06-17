<?php

//autoload do composer
require '../vendor/autoload.php';

//Dependências
use Google\Client as GoogleClient;
use App\User as SessionUser;

//Validação Principal do Cookie

// Verifica os campos obrigatórios
if(!isset($_POST['credential']) || !isset($_POST['g_csrf_token'])){
    header('location: ../Login/login_form.php');
    exit;
}

//Cookie CSRF
$cookie = $_COOKIE['g_csrf_token'] ?? '';

//Verifica o valor do cookie e do post para o CSRF
if($_POST['g_csrf_token' != $cookie]){
    header('location: ../Login/login_form.php');
    exit;
}

//Validação Secundária do Token

//Instância do Cliente Google
$client = new GoogleClient(['client_id' => '916942570766-od1jgcse9nah7dukaq39c8sl0nek9q3n.apps.googleusercontent.com']);

//Obtém os dados do usuário com base no JWT
$payload = $client->verifyIdToken($_POST['credential']);

//Verifica os dados do payload
if (isset($payload['email'])) {
    SessionUser::login($payload['name'], $payload['email']);
    header('location: ../HTML/index.php');
    exit;
}

//Problemas ao consultar API
die('Problemas ao consultar a API');

?>