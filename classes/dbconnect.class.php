<?php

class dbconnect {
    private $host = "studmysql01.fhict.local";
    private $user = "dbi464023";
    private $pass = "password";
    private $dbName = "dbi464023";

    protected function connect()
    {
        $dsn = 'mysql:host=' . $this->host .';dbname=' . $this->dbName;
        try 
        {
            $pdo = new PDO($dsn, $this->user, $this->pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, pDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            echo $e->GetMessage();
        }
       

        return $pdo;
    }
 
}

?>