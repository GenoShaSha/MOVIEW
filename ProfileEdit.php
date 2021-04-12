<?php
session_start();
include 'classes/dbconnect.class.php';
include 'classes/User.class.php';
$user = new User();
$user -> UpdateInformation();
?>

<!DOCTYPE html>
<html lang="en" > 
    <head>
        <meta charset="utf-8">
        <title>Profile</title>
        <link rel="stylesheet" href="styles\profile_authentication_styles.css">
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
            <a href="#">TAGS</a>
            <a href="#">RECENT</a>
            <input type="text" placeholder="Search...">
            <a href="ProfileView.php">PROFILE</a>
        </div>
        <div class="centerProfile" style = "position: absolute; top: 600px">
            <h1>Profile</h1>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div>
                <input type="file" name="Upload image">
                </div>
                    <div class="profilePic">
                        <img src="images\profPic.png" alt="Profile Picture"width="100" height="100" style = "position: relative; bottom: 15px">
                    </div>
            </form>
            <textarea rows="4" cols="50" name="UserInfo" form="profileform">
                        Enter text here...
            </textarea>
            <form method = "POST">
                <div class="txt_field">
                    <input type="Full Name" name = "full_name" id = "full_name" required>
                    <label>Full Name</label>
                </div>
                <div class="txt_field">
                    <input type="Email" name = "email" id = "email" required>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="text" name = "user_name" id = "user_name" required>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input type="password" name = "password" id = "password" required>
                    <label>Password</label>
                </div>
                <input type="submit" name = "updateBtn" id = "updateBtn" value = "Submit">
            </form>
            <div> <a href = "ProfileView.php">   Back: </a> </div>
        </div>
    </body>
</html>     


