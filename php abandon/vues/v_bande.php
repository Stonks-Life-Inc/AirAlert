<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bibliotheque en ligne</title>
        <link rel="stylesheet" href="css/accueil.css">
    </head>
    <body>
        <div id="Bande">
            
        </div>
<<<<<<< HEAD:vues/v_bande.php
        
=======
        <div id="Logo">
			<img src="images/logo_sli.png" width="215px" height="100px" 
            />
		</div>
>>>>>>> 7ffc0aa3b66ba59a35a63610d5eaeb8302a42277:php abandon/vues/v_bande.php

        <a id="Bouton_accueil" href="index.php?controleur=accueil" class="bouton">
            Accueil
        </a>
        <img src="images/logo_AirAlert.png" width="50%" height="50%"/>
        <?php
        if(!isset($_SESSION['user'])){
        ?>
            <a id="Bouton_connexion" href="index.php?controleur=connexion" class="bouton">
                Connexion
            </a>

            <a id="Bouton_inscription" href="index.php?controleur=inscription" class="bouton">
                Inscription
            </a>
        <?php
        }
        else {
            $user=unserialize($_SESSION['user']);
        ?>
            <a id="Bouton_deconnexion" href="index.php?controleur=deconnexion&action=deconnexion" class="bouton">
            Deconnexion
            </a>
        <?php
        }
        ?>