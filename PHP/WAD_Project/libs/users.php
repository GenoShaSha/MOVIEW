<?php 
namespace libs;

use PDO;
use PDOException;

class users extends dbController {
    private $uName;
    private $pswd;
    private $email; 

    public function __construct(string $usrName, string $pass, string $mail)
    {
        $this->$uName = $usrName;
        $this->$pswd = $pass;
        $this->$email = $mail;
    }

    private function AddUsers()
    {
        $query = "INSERT INTO users(email, pswd, username) VALUES (?,?,?)";
        if ($this->conn != null) 
        {
            if ($stmt = $this->conn->query($query)) 
            {
                if ($stmt->execute()) 
                {
                    if($this->$uName != "SELECT username FROM Users;")
                    return $stmt->fetchAll();
                }
            } else 
            {
                echo "something wrong with the prepare statement";
            }
        } else 
        {
            echo "Can't connect to DB!";
        }
        return null;

    }

    public function GetUserByID(int $id){
        $query = "SELECT * from Users where id = :UserID;";
        
        if ($this->conn != null){
            if ($stmt = $this->conn->prepare($query))
            {
                $stmt->bindParam(':UserID', $id);
                if ($stmt->execute()){
                    return $stmt->fetchAll();
                }
            }
            else {
                echo "something wrong with the prepare statement";
            }
        }
        else {
            echo "Can't connect to DB!";
        }
        return null;
    }

    public function GetUsers(){
        $query = "SELECT * FROM Users;";
        if ($this->conn != null) {
            if ($stmt = $this->conn->query($query)) {
                if ($stmt->execute()) {
                    return $stmt->fetchAll();
                }
            } else {
                echo "something wrong with the prepare statement";
            }
        } else {
            echo "Can't connect to DB!";
        }
        return null;
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