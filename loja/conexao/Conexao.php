<?php

class Conexao {

    private static $db_host = '104.236.106.180';
    private static $db_user = 'caminhao';
    private static $db_password = 'caminhao123'; 
    private static $db_name = 'caminhao';
    private static $instance;
    
    public static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = mysqli_connect(self::$db_host, self::$db_user, self::$db_password, self::$db_name);
        }
        return self::$instance;
    }
    
}