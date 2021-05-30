<?php

class User extends dbconnect
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
                $sql = "INSERT INTO `userinfo`(`id`, `username`, `userpassword`, `fullname`, `email`, `dateofbirth`, `role`) VALUES (NULL,?,?,?,?,?,'user')";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt -> execute([$username,$password, $fullname, $email, $dob]);
                header('location:indexSignUpSuccesful.php');
            }
            catch (PDOException $e)
            {
                echo $e ->GetMessage();
            }
        }
    }

    public function UploadProfileImage()
    {
        if(isset($_POST['uploadimgBtn']))
        {
            $filename = $_FILES["uploadfile"]["name"];
            $temp = $_FILES["uploadfile"]["tmp_name"];
            $folder = "images/Profiles/".$filename;
            if(isset($_SESSION['sess_user_id']))
            {
               echo $filename; 
                    $id = $_SESSION['sess_user_id'];
                try
                {
                    $query = "INSERT INTO `profileinfo`(`id`, `profileimage`) VALUES ($id , $filename)  ON DUPLICATE KEY UPDATE 'profileimage' = $filename";             
                    $stmt = $this -> connect() -> prepare($query);
                    $stmt -> execute(); 
                }
                catch (PDOException $e)
                {
                    echo $e ->GetMessage();
                }
            }
        }
            move_uploaded_file($temp, $folder);
            $_SESSION['sess_profile_pic'] = [$folder];         
    }
    
    public function RetrieveImage()
    {

    }

    public function UpdateUserInformation()
    {
        if(isset($_POST['updateBtn']))
        {
            $fullname = $_POST['full_name'];
            $username =  trim($_POST['user_name']); 
            $password =  trim($_POST['password']);
            $email = $_POST['email'];
            if($fullname == "")
            {
                $fullname = $_SESSION['sess_full_name'];
            }
            if($username == "")
            {
                $username = $_SESSION['sess_user_name'];
            }
            if($password == "")
            {
                $password = $_SESSION['sess_password'];
            }
            if($email == "")
            {
                $email = $_SESSION['sess_email'];
            }
            try
            {
                $query = "UPDATE `userinfo` SET `username`= ? ,`userpassword`= ?,`fullname`= ? ,`email`= ? WHERE `id` = $_SESSION[sess_user_id]";
                $stmt = $this -> connect() -> prepare($query);
                $stmt -> execute([$username,$password, $fullname, $email]);
                header('location:RetrieveInfo.php');  
            }
            catch (PDOException $e)
            {
                echo "Error : ".$e->getMessage();
            }
        }
        
    }

    public function RetrieveUserInfo()
    {
        if(isset($_SESSION['sess_user_id']))
        {
            try
            {
                $id = $_SESSION['sess_user_id'];
                $query = "SELECT * from `userinfo` where id = $id limit 1";
                $stmt = $this -> connect() -> prepare($query);
                $stmt -> execute();
                $result = $stmt -> fetch(PDO::FETCH_ASSOC);
                $_SESSION['sess_user_id'] = $result['id'];
                $_SESSION['sess_user_name'] = $result['username'];
                $_SESSION['sess_full_name'] = $result['fullname'];
                $_SESSION['sess_email'] = $result['email'];
                $_SESSION['sess_dob'] = $result['dateofbirth'];
            }
            catch (PDOException $e) 
            {
                echo "Error : ".$e->getMessage();
            }
           
        }
        header('location:ProfileView.php');
    }

    public function SubmitCredentials()
    {
        if (isset ($_POST['submitBtn']))
        {
            $username = trim($_POST['user_name']);
            $password = trim($_POST['password']);
            try
            {
                $query = "SELECT * FROM `userinfo` WHERE `username` = :username AND `userpassword` = :password";
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
                    $_SESSION['sess_role'] = $row['role'];
                    if($_SESSION['sess_role'] == "admin" )
                    {
                        header('location:adminpage.php');
                    }
                    else
                    {
                        header('location:index.php?loggedin');
                    }
                    
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
    public function InsertTags()
    {
        if(isset($_POST['submitTagsBtn']))
        {
            try
            {
                $tagName = trim($_POST['tag_name']);
                $sql = "INSERT INTO `taginfo`(`tagID`, `tagName`) VALUES (NULL,?)";
                $stmt = $this -> connect() -> prepare($sql);
                $stmt -> execute([$tagName]);
                header('location:tagsAddPage.php');
            }
            catch (PDOException $e)
            {
                echo $e ->GetMessage();
            }
        }
    }
}
?>