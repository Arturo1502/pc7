<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/CONFIGURACION/config.php';


class Database 
{
    
    private $username;
    private $password;
    private $dsn;
    private $conn;
    
    public function __construct()
    {
        
        $this->username = USER_NAME;
        $this->password = PASSWORD;
        $this->dsn = DSN;

        $this ->conn = new PDO($this->dsn, $this->username, $this->password);
    }


    function getConn()
    {
        return $this->conn;
    }

    function closeConn()
    {
        $this->conn = null;
    }
}
