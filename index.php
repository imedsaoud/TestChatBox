<?php 

// if(!isset($_SESSION['user_name'])) echo '<a href="./php/connexion.php">Connexion</a>';
// else echo '<a href="./php/disconnect.php">Déconnexion</a>';
require_once "./connexion.php";
$query ="SELECT 
            `m` . `message_content` ,
            `m` . `message_author`  
        FROM 
            `message` m
        ORDER BY 
        message_date ASC
        ;";

$stmt = $pdo->prepare($query);
$stmt->execute();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script defer src="./js/main.js"></script>
    <title>My Chat !</title>
</head>
<body>
    <section class = wrapper > 

        <section class = "conversation">
            <ul>

                <li>Clement</li>
          
                <li>Edwin</li>
           
                <li>Ams</li>
          
                <li>Louise</li>
           
                <li>Emily</li>
                
            </ul>
        </section>

        <section class = "chat">

            <div class="conv_name">
                <svg version="1.1" id="Capa_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 31.494 31.494" style="enable-background:new 0 0 31.494 31.494;" xml:space="preserve"><path style="fill:white;" d="M10.273,5.009c0.444-0.444,1.143-0.444,1.587,0c0.429,0.429,0.429,1.143,0,1.571l-8.047,8.047h26.554c0.619,0,1.127,0.492,1.127,1.111c0,0.619-0.508,1.127-1.127,1.127H3.813l8.047,8.032c0.429,0.444,0.429,1.159,0,1.587c-0.444,0.444-1.143,0.444-1.587,0l-9.952-9.952c-0.429-0.429-0.429-1.143,0-1.571L10.273,5.009z"/></svg>
                <p>Sabou</p>
            </div> 

            <section class="messages">
                <?php
                    
                    while($donnees = $stmt->fetch()) {
                            if($donnees['message_author'] == user) {
                                echo '<div class="message message--me">
                                        <p class="message__content">'. $donnees['message_content'] .'</p>
                                      </div>';  
                            } else {
                                echo '<div class= "message message--friend">
                                        <p class="message__author">' .$donnees['message_author'] . '</p>                                        
                                        <p class="message__content">' . $donnees['message_content'] .'</p>
                                        </div>';                
                            }
                        }
                ?>
            </section>

            <form action="./php/send.php" method="POST" class="send">
                <input autofocus autocomplete="off" placeholder="Message ..." name="message" type="text">
                <input type="submit" value="Envoyer" id="desk">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 334.5 334.5" style="enable-background:new 0 0 334.5 334.5;" xml:space="preserve" width="512px" height="512px"><g><path d="M332.797,13.699c-1.489-1.306-3.608-1.609-5.404-0.776L2.893,163.695c-1.747,0.812-2.872,2.555-2.893,4.481  s1.067,3.693,2.797,4.542l91.833,45.068c1.684,0.827,3.692,0.64,5.196-0.484l89.287-66.734l-70.094,72.1  c-1,1.029-1.51,2.438-1.4,3.868l6.979,90.889c0.155,2.014,1.505,3.736,3.424,4.367c0.513,0.168,1.04,0.25,1.561,0.25  c1.429,0,2.819-0.613,3.786-1.733l48.742-56.482l60.255,28.79c1.308,0.625,2.822,0.651,4.151,0.073  c1.329-0.579,2.341-1.705,2.775-3.087L334.27,18.956C334.864,17.066,334.285,15.005,332.797,13.699z" data-original="#000000" class="active-path" data-old_color="#E6E3E3" fill="#F2EEEE"/></g> </svg>
                </button>
            </form>

        </section>

    </section>
    
</body>
</html>



       