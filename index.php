<?php
session_start();
include 'classes/dbconnect.class.php';
include 'classes/User.class.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>TagsPage</title>
    <link rel="stylesheet" href="styles\mainstyles.css">
</head>

<body>
    <?php if (isset($_GET['loggedin'])) 
            { ?>

<div class="topnav">
        <a href="RetrieveInfo.php">
            Profile
        </a>
        <a href="logout.php">
            Logout
        </a>
        <a>
            <?php echo "Hello ".$_SESSION["sess_user_name"]?>
        </a>
    </div>
                
    <?php } ?>
    <?php if (!isset($_GET['loggedin'])) 
            { ?>

<div class="topnav">
        <a href="indexSignIn.php">
            Sign in
        </a>
        <a href="indexSignUp.php">
            Sign up
        </a>
    </div>
                
    <?php } ?>
 
    
    <div class="header">
        <h1> MOVIEW </h1>
    </div>

    <div class="navigation">
        
              <a href="index.php">HOME</a>
              <a href="#">GENRE</a>
              <a href="tagList.php">TAGS</a>
              <a href="#">RECENT</a>
              <input type="text" placeholder="Search...">
              <?php if (isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin")
              {?>
                <a href="adminpage.php">ADMIN PAGE</a> 
             <?php } ?>
              
    </div>
                

    <div class="movietags">
        <div id="movieimg">
            <h2 class="TITLETAGS1">EASY WATCHING</h2>
            <img class="EASYWATCHING1" src="images\MoviePics\ToyStory.jpeg" alt="pic is gone">
            <img class="EASYWATCHING2" src="images\MoviePics\KungFuPanda.jpg" alt="pic is gone" >
            <img class="EASYWATCHING3" src="images\MoviePics\Incredibles2.jpg" alt="pic is gone" >
            <img class="EASYWATCHING4" src="images\MoviePics\Spongebob.jpg" alt="pic is gone" >
        </div>
       <div id= "movieimg">
            <h2 class="TITLETAGS2">EERIE</h2>
            <img class="EERIE1" src="images\MoviePics\Hereditary.jpg" alt="pic is gone">
            <img class="EERIE2" src="images\MoviePics\TheBlair.jpg" alt="pic is gone" >
            <img class="EERIE3" src="images\MoviePics\TheLighthouse.jpeg" alt="pic is gone" >
            <img class="EERIE4" src="images\MoviePics\Midsommar.png" alt="pic is gone">
       </div>
     
        <div id="movieimg">
            <h2 class="TITLETAGS3">EMOTIONAL</h2>
            <img class="EMOTIONAL1" src="images\MoviePics\FiftyShadesOfGrey.jpg" alt="pic is gone" >
            <img class="EMOTIONAL2" src="images\MoviePics\TheBestOfMe.jpg" alt="pic is gone" >
            <img class="EMOTIONAL3" src="images\MoviePics\TheChoice.jpg" alt="pic is gone" >
            <img class="EMOTIONAL4" src="images\MoviePics\TheLuckOne.jpg" alt="pic is gone" >
        </div>
        
        <div id="movieimg">
            <h2 class="TITLETAGS3">EPIC</h2>
            <img class="EPIC1" src="images\MoviePics\LordOfTheRings.jpg" alt="pic is gone">
            <img class="EPIC2" src="images\MoviePics\Dunkirk.jpg" alt="pic is gone" >
            <img class="EPIC3" src="images\MoviePics\Ran.jpg" alt="pic is gone" >
            <img class="EPIC4" src="images\MoviePics\ThreeThousand.jpg" alt="pic is gone">
        </div>
        
    </div>
</body>
</html>