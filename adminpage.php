<?php
session_start();
include 'classes/dbconnect.class.php';
include 'classes/Admin.class.php';
$admin = new Admin();
if( $_SESSION['sess_role'] == "admin")
{
    echo "<h1>User list</h1>";
    $admin ->ShowUsers();
}

?>
<!DOCTYPE html>
<a href = "logout.php">Log Out</a>