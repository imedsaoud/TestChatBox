<?php 
session_start();  // on doit démarrer la session


  // aucun affichage ne doit etre effectué avant l'appel à session_start()
  echo '<pre>' .print_r($_SESSION, true). '</pre>';

  $_SESSION['pseudo'] = 'pseudo';
  $_SESSION['email'] = 'toto@mail.fr';

  echo '<pre>' .print_r($_SESSION, true). '</pre>';
  // supprimer une variable (clé de tableau avec unset)
  unset($_SESSION['email']);

  // pour vider la session
  session_destroy();
  header('location: http://www.google.fr/'); // redirection de l'utilisateur

  echo '<pre>' .print_r($_SESSION, true). '</pre>';