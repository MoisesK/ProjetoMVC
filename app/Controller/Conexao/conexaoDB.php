<?php
namespace App\Controller\Conexao;

//  Responsável pela minha conexão com o banco de dados 

abstract class conexaoDB{

    private static $instance;
    public static function getConn(){

        if(!isset(self::$instance)){
            self::$instance = new \PDO("mysql:host=localhost;dbname=crud;charset=utf8","root","");
        }
            return self::$instance;
    }
}


?>