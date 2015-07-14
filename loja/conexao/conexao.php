<?php
class conexao {

    private static $db_host = '104.236.106.180'; // servidor
    private static $db_user = 'caminhao'; // usuario do banco
    private static $db_pass = 'caminhao123'; // senha do usuario do banco
    private static $db_name = 'caminhao'; // nome do banco
    private static $instance = null;
    private static $instance = null;

    public static function getInstance(){
        if(self::$instance == null) {
            self::$instance = mysqli_connect(self::$db_host, self::$db_user, self::$db_pass, self::$db_name);
            mysqli_set_charset(self::$instance, "utf8");
        }
        return self::$instance;
    }

}

?>