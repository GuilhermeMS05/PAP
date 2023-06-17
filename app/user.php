<?php

namespace App;

class User
{

    /**
     * Método responsável por iniciar a sessão dentro da aplicação
     * @return boolean
     */
    private static function init(){
        return session_status() !== PHP_SESSION_ACTIVE ? session_start() : true;
    }

    /**
     * Método responsável por definir a sessão de login do usuário
     * @param string $name
     * @param string $email
     */
    public static function login($name, $email){
        //Inicia sessão da aplicação
        self::init();

        //Define sessão do usuário 
        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email
        ];
    }

    /**
     * Método responsável por verificar se o usuário esta logado
     */
    public static function isLogged(){
        //Inicia sessão da aplicação
        self::init();

        //Retorna a existência do índice user na sessão
        return isset($_SESSION['user']);
    }

    /**
     * Método responsável por retornar as informações guardadas na sessão do usuário
     * @return array
     */
    public static function getInfo(){
        //Inicia sessão da aplicação
        self::init();

        //Retorna a existência do índice user na sessão
        return $_SESSION['user'] ?? [];
    }
}
?>