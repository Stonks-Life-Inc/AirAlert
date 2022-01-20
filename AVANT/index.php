<?php
    require_once("class/class.connexionDAO.inc.php");
    include_once("vues/v_bande.php");
    if(!isset($_REQUEST['controleur']))
        $controleur = 'accueil';
    else
    $controleur = $_REQUEST['controleur'];

    $laliste = new connexionDAO();

    switch($controleur)
    {
        case 'accueil':
            {include("vues/v_accueil.php");break;}
        case 'connexion':
            {include("vues/v_connexion.php");break;}
        case 'inscription':
            {include("vues/v_inscription.php");break;}
        case 'v_inscription':
            {include("controleur/c_pouet.php");break;}
        case 'v_connexion':
            {include("controleur/c_pouet.php");break;}
        case 'deconnexion':
            {include("controleur/c_pouet.php");break;}
        case 'v_noter':
            {include("controleur/c_pouet.php");break;}
    }
    include("vues/v_pied.php") ;
?>