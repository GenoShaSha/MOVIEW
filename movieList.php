<?php
session_start();
if ($_SESSION['sess_role'] == "admin")
{
    include 'classes/dbconnect.class.php';
    include 'classes/Admin.class.php';
    $admin = new Admin();
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
            <a href = "adminpage.php"> ADMIN PAGE </a>
            <a href = "#">MOVIE LIST</a>
            <a href = "userList.php">USER LIST</a>           
        </div>
        <div class = "center"> 
        <a href="movieAddpage.php">ADD MOVIE</a>
        <?php
        if( $_SESSION['sess_role'] == "admin")
        {
            echo "<h1>Movie list</h1>";
            $admin ->ShowMovies()
        }
       ?>
       </div>
   </body>
</html>   