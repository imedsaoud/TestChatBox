<?php 
echo 'Création de formulaire pour envoyer des fichiers';

if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
  if($_FILES['image']['size'] <= 3000000){
    $informationImage = pathinfo($_FILES['image']['name']);
    $extensionImage = $informationImage['extension'];
    $extensionArray = array('png', 'gif', 'jpg', 'JPEG');
    if (in_array($extensionImage, $extensionArray)){
      //move_uploaded_file($_FILES['image']['tpm_name'], 'upload/'.time().basename($_FILES['image']['name']));
      move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.time().rand().rand().'.'.$extensionImage);
      echo 'C\'est envoyé !';
    }
  }
}

echo '<form method="post" action="index2.php" enctype="multipart/form-data">
        <p>
          <h1>Formulaire envoi</h1>
          <input type="file" name="image"><br>
          <button type="submit">Envoyer</button>
        </p>
      </form>';