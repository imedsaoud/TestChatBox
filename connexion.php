<?php 
session_start();
$_SESSION['user_name'] = 'user';  // this line fakes the connection

try
{
    $pdo = new PDO("mysql:dbname=mychat;port=3306;host=127.0.0.1","root", "root");
}
catch (PDOException $e)
{
    echo 'Error: ' . $e->getMessage();  
    exit();
} 

