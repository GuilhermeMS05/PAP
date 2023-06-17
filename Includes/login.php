<?php
    session_start();
    if(!isset($_SESSION['user'])){
        $_SESSION['user'] = "";
        $_SESSION['nome'] = "";
        $_SESSION['tipo'] = "";
    }

    function gerarHash($senha){
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        return $hash;
    }

    function testarHash($senha, $hash){
        $ok = password_verify($senha, $hash);
        return $ok;
    }

    function logout(){
        $_SESSION['user'] = "";
        $_SESSION['nome'] = "";
        $_SESSION['tipo'] = "";
    }

    function is_logado(){
        if(empty($_SESSION['user'])){
            return false;
        } else{ 
            return true;
        }
    }

    function is_admin(){
        $t = $_SESSION['tipo'] ?? null;
        if(is_null($t)){
            return false;
        } else{
            if($t == 'admin'){
                return true;
            } else{
                return false;
            }
        }
    }

    function is_user(){
        $t = $_SESSION['tipo'] ?? null;
        if(is_null($t)){
            return false;
        } else{
            if($t == 'user'){
                return true;
            } else{
                return false;
            }
        }
    }
    
?>