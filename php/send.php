<?php
session_start(); // Launch the session on this page

// Redirects to the index page if the user isn't connected
if(!isset($_SESSION['user_name'])) {
    header('Location: ../index.php');
}

// Store the message and the username to save them in the DB
$message = $_POST['message'];
$user = $_SESSION['user_name'];

// Process to 'clean' the variables in order to avoid scripts etc.
$message = htmlspecialchars($message);
$user = htmlspecialchars($user);


// Connexion to the database:
try
{
    $pdo = new PDO("mysql:dbname=mychat;port=3306;host=127.0.0.1","root", "root");
}
catch (Error $e)
{
    echo 'Error: ' . $e->getMessage();  // if an error occurs, displays the error and stop the script
    exit();
} 
$answer = $pdo->exec('INSERT INTO message(message_content,message_author) VALUES (\''.$message.'\', \''.$user.'\')');

// Close connection
$pdo = null;
header('location: ../index.php');

// --------------------------------------------------------------------------------------------------------------------------------------------
// Displaying content exemple 
//$position = 0;
// do {
//   echo $position;
//   $answer = $pdo->query('select position_contenu from contenu where tag_cours='.$tag.' and position_contenu>'.$position);
//   $position += 1;
// }while($donnees = $answer->fetch());
