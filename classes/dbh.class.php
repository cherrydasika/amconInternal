<?php
class Dbh{
    private $serverName ="mysql-amcondbms.theamcongroup.me";
    private $username="amcon_dbms";
    private $pwd="nxZXCDrp";
    private $dbName="amcon_dbms_system";
    //private $port ="3306";

    protected function connect(){
        $conn = new PDO("mysql:host=$this->serverName; dbname=$this->dbName;", $this->username, $this->pwd);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}


?>