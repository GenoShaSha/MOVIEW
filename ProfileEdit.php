<?php
session_start();
include 'classes/dbconnect.class.php';
include 'classes/User.class.php';
$user = new User();
$user -> UpdateUserInformation();
if(isset($_FILES["uploadfile"]))
{
    $user -> UploadProfileImage();
}
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
            <a href="tagList.php">TAGS</a>
            <a href="#">RECENT</a>
            <input type="text" placeholder="Search...">
        </div>
        <div class="centerProfile" style = " position: absolute; top: 700px;left: 550px">
            <h1>Profile</h1>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div>
                <input type="file" name="uploadfile">
                </div>
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
                <input type = "submit" value = "Upload Image" name = "uploadimgBtn" id = "uploadimgBtn">
            </form>
            <textarea rows="4" cols="50" name="UserInfo" form="profileform">
                        Enter text here...
            </textarea>
            <form method = "POST">
                <div class="txt_field">
                    <input type="Full Name" name = "full_name" id = "full_name" value = "" >
                    <label>Full Name</label>
                </div>
                <div class="txt_field">
                    <input type="Email" name = "email" id = "email" value = "" >
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="text" name = "user_name" id = "user_name" value = "" >
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input type="password" name = "password" id = "password" value = "" >
                    <label>Password</label>
                </div>
                <input type="submit" name = "updateBtn" id = "updateBtn" value = "Submit">
            </form>
            <div> <a href = "ProfileView.php">   Back: </a> </div>
        </div>
    </body>
</html>     


