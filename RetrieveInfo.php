<?php
session_start();
include 'classes/dbconnect.class.php';
require_once 'classes/User.class.php';
$user = new User();
$user -> RetrieveUserInfo();
?>