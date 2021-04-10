<?php
session_start();
include 'classes/dbconnect.class.php';
include 'classes/dbhelper.class.php';
$dbHelp = new dbhelper();
$dbHelp -> InsertUserInformation();
?>

<!DOCTYPE html> 
<html lang="en" dir="ltr"> 
    <head>
        <meta charset="utf-8">
        <title>SignUp Form</title>
        <link rel="stylesheet" href="style.css">
    </head> 

    <body>
        <div class="center">
            <h1>Sign Up</h1>
            <form method="post">
                <div class = "txt_field">
                    <input type = "text" name = "full_name" id = "full_name" required>
                    <label>Full Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" name = "user_name" id = "user_name" required>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input type="email" name = "email" id = "email" required>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="password" name = "password" id = "password" required>
                    <label>Password</label>
                </div>  
                <div class = "txt_field">
                    <input type = "date" name = "dateofbirth" id = "dateofbirth">
                    <label>Date of Birth</label>
                </div>
                <button type="submit" name = "submitBtn" id = "submitBtn" value = "signup">Sign Up</button>
            </form>
        </div>
    </body>
</html>