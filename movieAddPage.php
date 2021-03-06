<?php
session_start();
if ($_SESSION['sess_role'] == "admin")
{
    include 'classes/dbconnect.class.php';
    include 'classes\Admin.class.php';
    $admin = new Admin();
    $admin -> InsertMovieInformation();
    $admin -> RemoveMovies();
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
            <a href = "movieList.php">MOVIE LIST</a>
            <a href = "userList.php">USER LIST</a>
            <a href = "tagList.php">TAG LIST</a>           
        </div>
        <div class="center">
            <form method="post">
                <div class = "txt_field">
                    <input type = "text" name = "title" id = "title" required>
                    <label>Movie Title</label>
                </div>
                <div class="txt_field">
                    <input type="text" name = "director_name" id = "director_name" required>
                    <label>Director Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" name = "genre" id = "genre" required>
                    <label>Genre(s)</label>
                </div>
                <div class = "txt_field">
                    <input type = "date" name = "releaseDate" id = "releaseDate">
                    <label>Release Date</label>
                </div>
                <div class="txt_field">
                    <input type="text" name = "actors" id = "actors" required>
                    <label>Actor(s)</label>
                </div>
                <button type="submit" name = "submitBtn" id = "submitBtn" value = "signup">Sign Up</button>
            </form>
        </div>
        <div class="center">
            <h1>Remove Movie</h1>
            <form method="post">
                <div class = "txt_field">
                    <input type = "text" name = "movie_id" id = "movie_id" required>
                    <label>Movie ID</label>
                </div>
                <button type="submit" name = "submitMovTagsBtn" id = "submitMovTagsBtn" value = "Remove">Remove</button>
            </form>
        </div>
    </body>
</html>