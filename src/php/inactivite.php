<?php

session_start();

echo 'Temps actuel : ' . time() . '<br>';

echo '<pre>' .print_r($_SESSION, true). '</pre>';

if (isset($_SESSION['temps'])) {
  //si on a pas dépassé la limite de connection
  if ($_SESSION['temps'] + $_SESSION['limite'] > time()){
    echo 'Mise à jour';
    $_SESSION['temps'] = time();

  } else {
    echo 'Deconnexion';
    session_destroy();
  }


  } else {
      echo 'Connexion...';
    // nbr de scd autorisées
    $_SESSION['limite'] = 10;
    // timestamp de dernière activitées
    $_SESSION['temps'] = time();
}