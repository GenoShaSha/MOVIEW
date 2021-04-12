<?php
session_start();
include 'classes/dbconnect.class.php';
include 'classes/User.class.php';
$user = new User();
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
            <h1><?php echo  $_SESSION['sess_user_name'] ?></h1>
            <div class="profilePic">
                        <?php if (isset($_SESSION['sess_profile_pic'])) 
                        { ?>
                        <?php $path = $_SESSION['sess_profile_pic'][0];?>
                       <img src= "<?php echo $path; ?>" alt="Profile Picture"width="100" height="100" style = "position: relative; bottom: 15px">
                        <?php } ?>
                        
                        <?php if (!isset($_SESSION['sess_profile_pic'])) 
                        { ?>
                        <img src="images\profPic.png" alt="Profile Picture"width="100" height="100" style = "position: relative; bottom: 15px">   
                        <?php } ?>
                   
                    </div>
            <textarea rows="4" cols="50" name="UserInfo" form="profileform">
                        Enter text here...
            </textarea>
            <div class = "txt_field"> <p> Name: <?php echo $_SESSION['sess_full_name'] ?> </p> </div>
            <div class = "txt_field"> <p> Email: <?php echo $_SESSION['sess_email'] ?></p> </div>
            <div class = "txt_field"> <p> Date of birth: <?php echo $_SESSION['sess_dob'] ?></p> </div>
            <div class = "txt_field"> <a href = "ProfileEdit.php"> Edit profile</a>
            <!-- <form method = "post" id = "profileform">
                <div class="txt_field">
                    <input type="Full Name"required>
                    <label>Full Name</label>
                </div>
                <div class="txt_field">
                    <input type="Email" required>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="text" required>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input type="password" required>
                    <label>Password</label>
                </div>
                <button type="submit">Edit</button>
            </form> -->
        </div>
    </body>
</html>     


