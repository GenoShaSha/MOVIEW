<?php

class dbconnect {
    private $host = "localhost";
    private $user = "root";
    private $pass = "123";
    private $dbName = "practice";

    protected function connect()
    {
        $dsn = 'mysql:host=' . $this->host .';dbname=' . $this->dbName;
        try 
        {
            $pdo = new PDO($dsn, $this->user, $this->pass);
            $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, pDO::FETCH_ASSOC);
            echo "Connection successful.";
        }
        catch (PDOException $e)
        {
            echo $e->GetMessage();
        }
       

        return $pdo;
    }
 
}

?>