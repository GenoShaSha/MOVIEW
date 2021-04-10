<?php
session_start();
include 'classes/dbconnect.class.php';
include 'classes/dbhelper.class.php';

?>

<!DOCTYPE html>
<html lang-en>
<head>
	<meta characterset=utf-8>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OO PHP</title>
</head>
<body>
<?php if (isset($_GET['succesful_signup'])) 
            { ?>

            <p> Sign up succesfull!.</p> 
                
<?php } ?>
<a href = "indexSignIn.php"> Sign In </a> 
<div><?php echo "Hello ".$_SESSION["sess_user_name"]?></div>
<a href = "indexSignUp.php">Sign Up </a>

</body>
</html>