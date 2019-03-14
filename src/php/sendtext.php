<?php 
echo 'Création de formulaire';

if (isset($_POST['prenom']) && isset($_POST['nom'])){
  $prenom = htmlspecialchars($_POST['prenom']);
  $nom = htmlspecialchars($_POST['nom']);

  echo $prenom.' a écrit'.$nom;
}

echo '<form method="post" action="index2.php">
        <p>
          <table>
            <tr>
              <td>Prénom</td>
              <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
              <td>Content</td>
              <td><input type="textarea" name="content"></td>
            </tr>
          </table>
          <button type="submit">Envoyer</button>
        </p>
      </form>';