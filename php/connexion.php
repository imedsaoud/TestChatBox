<?php 
session_start();
$_SESSION['user_name'] = 'Guest';  // this line fakes the connection
header('location: ../index.php');
