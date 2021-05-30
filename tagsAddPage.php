<?php
session_start();
if ($_SESSION['sess_role'] == "admin")
{
    include 'classes/dbconnect.class.php';
    include 'classes\Admin.class.php';
    $admin = new Admin();
    $admin -> InsertMovieInformation();
}
else if (isset($_SESSION['sess_role']))
{
    header('location: index.php?loggedin'); 
}
else
{
    header('location: index.php');
}

?>

<!DOCTYPE html> 
<html lang="en" dir="ltr"> 
    <head>
        <meta charset="utf-8">
        <title>SignUp Form</title>
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
            <a href = "adminpage.php"> ADMIN PAGE </a>
            <a href = "movieList.php">MOVIE LIST</a>
            <a href = "userList.php">USER LIST</a>           
            <a href = "#">ADD TAGS</a>           

        </div>
        <div class="center">
            <h1>Add Tags</h1>
            <form method="post">
                <div class = "txt_field">
                    <input type = "text" name = "tag_name" id = "tag_name" required>
                    <label>Tag Name</label>
                </div>
                <button type="submit" name = "submitTagsBtn" id = "submitTagsBtn" value = "Add">Add</button>
            </form>
        </div>
    </body>
</html>