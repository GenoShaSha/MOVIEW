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
    <style>
* {box-sizing: border-box}
.mySlides1, .mySlides2, .mySlides3, .mySlides4 {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: black;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a grey background color */
.prev:hover, .next:hover {
  background-color: #f1f1f1;
  color: black;
}
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: -1px;
  margin-left: 28px;
  width: 100%;
  text-align: center;
}
</style>
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
              <a href="tagShowcase.php">TAGS</a>
              <a href="#">RECENT</a>
              <input type="text" placeholder="Search...">
              <?php if (isset($_SESSION['sess_role']) && $_SESSION['sess_role'] == "admin")
              {?>
                <a href="adminpage.php">ADMIN PAGE</a> 
             <?php } ?>
              
    </div>
    <p>Easy Watching:</p>
<div class="slideshow-container">
  <div class="mySlides1">
    <img src="images\MoviePics\ToyStory.jpeg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> Toy Story 4 </div>
  </div>

  <div class="mySlides1">
    <img src="images\MoviePics\KungFuPanda.jpg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> Kung Fu Panda 2 </div>
  </div>

  <div class="mySlides1">
    <img src="images\MoviePics\Incredibles2.jpg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> Incredibles 2 </div>
  </div>
  
  <div class="mySlides1">
    <img src="images\MoviePics\Spongebob.jpg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> Spongebob Squarepants Movie </div>
  </div>

  <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
  <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
</div>

<p>Eerie:</p>
<div class="slideshow-container">
  <div class="mySlides2">
    <img src="images\MoviePics\Hereditary.jpg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> Hereditary </div>
  </div>

  <div class="mySlides2">
    <img src="images\MoviePics\TheBlair.jpg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> Blair Witch Project </div>
  </div>

  <div class="mySlides2">
    <img src="images\MoviePics\TheLighthouse.jpeg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> The Lighthouse </div>
  </div>
  <div class="mySlides2">
    <img src="images\MoviePics\Midsommar.png" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> Midsommar </div>
  </div>
  <a class="prev" onclick="plusSlides(-1, 1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1, 1)">&#10095;</a>
</div>


<p>Emotional:</p>
<div class="slideshow-container">
  <div class="mySlides3">
    <img src="images\MoviePics\FiftyShadesOfGrey.jpg"" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> Fifty Shades of Grey </div>
  </div>

  <div class="mySlides3">
    <img src="images\MoviePics\TheBestOfMe.jpg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> The Best of Me </div>
  </div>

  <div class="mySlides3">
    <img src="images\MoviePics\TheChoice.jpg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> The Choice </div>
  </div>
  <div class="mySlides3">
    <img src="images\MoviePics\TheLuckOne.jpg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> The Lucky One </div>
  </div>
  <a class="prev" onclick="plusSlides(-1, 2)">&#10094;</a>
  <a class="next" onclick="plusSlides(1, 2)">&#10095;</a>
</div>

<p>Epic:</p>
<div class="slideshow-container">
  <div class="mySlides4">
    <img src="images\MoviePics\LordOfTheRings.jpg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> Lord of the Rings </div>
  </div>

  <div class="mySlides4">
    <img src="images\MoviePics\Dunkirk.jpg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> Dunkirk </div>
  </div>

  <div class="mySlides4">
    <img src="images\MoviePics\Ran.jpg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> Ran </div>
  </div>
  <div class="mySlides4">
    <img src="images\MoviePics\ThreeThousand.jpg" style="margin-left: 400px; margin-right: auto; width:25%">
    <div class = "text"> 300 </div>
  </div>
  <a class="prev" onclick="plusSlides(-1, 3)">&#10094;</a>
  <a class="next" onclick="plusSlides(1, 3)">&#10095;</a>
</div>

<script>
var slideIndex = [1,1,1,1];
var slideId = ["mySlides1", "mySlides2", "mySlides3","mySlides4"]
showSlides(1, 0);
showSlides(1, 1);
showSlides(1, 2);
showSlides(1,3);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}    
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex[no]-1].style.display = "block";  
}
</script>
</body>
</html>