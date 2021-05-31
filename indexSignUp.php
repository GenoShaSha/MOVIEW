<?php
include 'classes/dbconnect.class.php';
include 'classes\User.class.php';
$dbHelp = new User();
$dbHelp -> InsertUserInformation();
?>

<!DOCTYPE html> 
<html lang="en" dir="ltr"> 
    <head>
        <meta charset="utf-8">
        <title>SignUp Form</title>
        <link rel="stylesheet" href="styles\profile_authentication_styles.css">
        <script src = "/js/validation.js"> </script>
    </head> 
    <body>
    <div class="topnav">
        <a href="RetrieveInfo.php">
            Profile
        </a>
        <a href="logout.php">
            Logout
        </a>
        </div>
        <div class="header">
            <h1> MOVIEW </h1>
        </div>
        <div class="navigation">
            <a href="index.php?loggedin">HOME</a>
            <a href="#">GENRE</a>
            <a href="tagList.php">TAGS</a>
            <a href="#">RECENT</a>
            <input type="text" placeholder="Search...">
        </div>
        <div class="center">
            <h1>Sign Up</h1>
            
            <form name = "SignUpForm" method="post" onsubmit = return validateSignUp() >
                <div class = "txt_field">
                    <input type = "text" name = "full_name" id = "full_name" required>
                    <span id = "errorfull"></span>
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
                    <input type="password" id="password">
                    <label>Password</label>
                    <input type="checkbox" onclick="ShowPassword()">
                    <script>
                    function ShowPassword() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                    }
                    </script>
                    
                </div>  
                <div class = "txt_field">
                    <input type = "date" name = "dateofbirth" id = "dateofbirth">
                </div>
                <button type="submit" name = "submitBtn" id = "submitBtn" value = "signup">Sign Up</button>
            </form>
        </div>
    </body>
</html>