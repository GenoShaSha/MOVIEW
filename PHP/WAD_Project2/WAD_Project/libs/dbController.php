<?php 
namespace libs;

use PDO;
use PDOException;

class DBController {
    private $host = "localhost";
    private $user = "root";
    private $pass = ""; 
    private $dbName = "wad_webstite";
    public $conn = null;

    public function __construct()
    {
        $this->conn = $this->ConnectDB();
    }

    private function ConnectDB()
    {
        // Error can be caught in try catch
        try{
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->pass);
        }
        catch (PDOException $ex){
            echo 'Error: '.$ex->getMessage();
            return null;
        }
        
        return $conn;
    }

    public function CloseDB(){
        if ($this->conn != null){
            $this->conn = null;
        }
    }

    public function InsertQuery(string $queryString, $values = [])
    {
        if ($this->conn != null){
            if ($stmt = $this->conn->prepare($queryString)){
                foreach ($values as $key => $value) {
                    $stmt->bindParam($key, $value);
                }
                
                if ($stmt->execute()){
                    return $stmt->fetchAll();
                }
                else {
                    echo "something wrong with the Query";
                }
            }
            else {
                echo "something wrong with the prepare statement";
            }
        }
        else {
            echo "Cant Connect to the DB!";
        }
        return null;
    }

    public function SelectQuery(string $queryString)
    {
        if ($this->conn != null) {
            if ($stmt = $this->conn->query($queryString)) {
                if ($stmt->execute()) {
                    return $stmt->fetchAll();
                } else {
                    echo "something wrong with the Query";
                }
            } else {
                echo "something wrong with the prepare statement";
            }
        } else {
            echo "Cant Connect to the DB!";
        }
        return null;
    }
}

?>