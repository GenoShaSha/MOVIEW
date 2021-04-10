<?php
session_start();
include 'classes/dbconnect.class.php';
include 'classes/dbhelper.class.php';
$dbHelp = new dbhelper();
$dbHelp -> SubmitCredentials();
?>


<!DOCTYPE html> 
<html lang="en" dir="ltr"> 
    <head>
        <meta charset="utf-8">
        <title>SignIn Form</title>
        <link rel="stylesheet" href="style.css">
    </head> 
    <body>
        <div class="center">
            <h1>Login</h1>
            <form method="post">
            <?php if (isset($_GET['error'])) 
            { ?>

            <p class = "error"> Error: wrong user credentials.</p> 
                
            <?php } ?>
                <div class="txt_field">
                    <input type="text" name = "user_name" id = "user_name" required>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input type="password" name = "password" id = "password" required>
                    <label>Password</label>
                </div>
                <div class="pass">Forgot Password?</div>
                <input type="submit" name = "submitBtn" id = "submitBtn" value="Login">
                <div class="SignUp_link">
                   Haven't Sign Up? <a href = "indexSignUp.php">SignUp</a> 
                </div>
                
            </form>
        </div>
    </body>

</html>