<?php
require_once  "../connexion.php";


// // Redirects to the index page if the user isn't connected
// if(!isset($_SESSION['user_name'])) {
//     header('Location: ../index.php');
// }

// Store the message and the username to save them in the DB

$user = $_SESSION['user_name'];

// Process to 'clean' the variables in order to avoid scripts etc.
$message = htmlspecialchars($message);
$user = htmlspecialchars($user);



$query ='INSERT INTO 
        message(message_content,message_author) 
        VALUES (:content , :user_name)' ;
$stmt = $pdo->prepare($query);
$stmt->bindValue(":content" , $_POST['message']);
$stmt->bindValue(":user_name" , $_SESSION['user_name']);
$stmt->execute();


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
