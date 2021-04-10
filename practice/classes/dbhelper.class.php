<?php

class dbhelper extends dbconnect
{
    public function InsertUserInformation ()
    {

        if(isset($_POST['submitBtn']))
        {
            try
            {
                $username = trim($_POST['user_name']);
                $password = trim($_POST['password']);
                $fullname = trim($_POST['full_name']);
                $email = trim($_POST['email']);
                $dob = $_POST['dateofbirth'];
                $sql = "INSERT INTO `logininfo`(`id`, `username`, `userpassword`, `fullname`, `email`, `dateofbirth`) VALUES (NULL,?,?,?,?,?)";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt -> execute([$username,$password, $fullname, $email, $dob]);
                echo "Sign up succesfull!";
                header('location:index.php?succesful_signup');
            }
            catch (PDOException $e)
            {
                echo $e ->GetMessage();
            }
        }
    }

    public function check_login()
    {
        if(isset($_SESSION['sess_user_id']))
        {
            $id = $_SESSION['sess_user_id'];
            $query = "SELECT * from users where id = ? limit 1";
            $stmt = $this -> connect() -> prepare($query);
            $result = $stmt -> execute([$id]);
            $row_count = $result ->rowCount();
            if($row_count > 0 )
            {
                $userdata = $result -> fetch(PDO::FETCH_ASSOC); 
                echo $userdata;
                return $userdata;
            }
            else
            {
                echo "no session detected";
            }
        }
        exit();
    }

    public function SubmitCredentials()
    {
        if (isset ($_POST['submitBtn']))
        {
            $username = trim($_POST['user_name']);
            $password = trim($_POST['password']);
            try
            {
                $query = "SELECT * FROM `logininfo` WHERE `username` = :username AND `userpassword` = :password";
                $stmt = $this -> connect() -> prepare($query);
                $stmt -> bindParam(':username', $username, PDO::PARAM_STR);
                $stmt -> bindValue(':password', $password, PDO::PARAM_STR);
                $stmt ->execute();
                $count = $stmt -> rowCount();
                $row = $stmt -> fetch(PDO::FETCH_ASSOC);
                if($count == 1 && !empty($row))
                {
                    $_SESSION['sess_user_id'] = $row['id'];
                    $_SESSION['sess_user_name'] = $row['username'];
                    $_SESSION['sess_password'] = $row['userpassword'];

                    header('location:index.php');
                }
                else
                {
                    header('location:indexSignIn.php?error');
                }

            }
            catch (PDOException $e) {
                echo "Error : ".$e->getMessage();
              }
        }
    }
}
?>