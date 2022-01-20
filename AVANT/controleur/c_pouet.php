<?php
    $action=$_REQUEST['action'];
    require_once("class/class.note.inc.php");
    require_once("class/class.utilisateur.inc.php");
    require_once("class/class.gestionConnexion.inc.php");
    switch ($action) {
        case 'inscription':
            if(isset($_POST['forminscription'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = sha1($_POST['password']);
                $password2 = sha1($_POST['password2']);
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);               
                $tayusername = strlen($username);
                if($tayusername <= 255) {
                    if($password==$password2) {
                        $utilisateur = new utilisateur($username,$password,$nom,$prenom);
                        $lecteur=$laliste->nvUser($utilisateur);
                        include("vues/v_accueil.php");
                        break;
                    }
                    else {
                        $erreur = "Les mots de passe sont différents.";
                        include("vues/v_inscription.php");
                        break;
                    }
                }
                else {
                    $erreur = "Votre nom d'utilisateur ne doit pas dépasser 255 caractères.";
                    include("vues/v_inscription.php");
                    break;
                }
                
            }
        case 'connexion':
            if(isset($_POST['formconnexion'])) {
                $usernameconnect=htmlspecialchars($_POST['usernameconnect']);
                $mdpconnect=sha1($_POST['passwordconnect']);
                
                $connecteur=$laliste->searchUser($usernameconnect,$mdpconnect);

                if($connecteur==1){
                    $user=$laliste->createUserSession($usernameconnect,$mdpconnect);
                    $_SESSION['user']=serialize($user);
?>
                <div id=message_connexion>
                    <h1>Vous êtes connecté.</h1>
                </div>
<?php
                }
                else{
                    $erreur="Mauvais identifiant ou mot de passe.";
                    include("vues/v_connexion.php");
                    break;
                }
            }
            break;
        case 'deconnexion':
            $_SESSION['user']=NULL;
            include("vues/v_accueil.php");
            break;
        case 'noter':
            $idretour=$_REQUEST['idretour'];
            $lien="livre.php?idlivre=".$idretour;
            if(isset($_POST['formnoter'])) {
                $note = htmlspecialchars($_POST['note']);
                if($note <= 10) {
                    if ($note >= 0) {
                        $user=unserialize($_SESSION['user']);
                        $idlecteur=$user->getId();
                        $lanote = new note($note);
                        $lanote->setIdLecteur($idlecteur);
                        $lanote->setIdLivre($idretour);
                        $noter=$laliste->noterLivre($lanote);
                        ?>
                            <a id="Bouton_retour" href=<?php echo $lien ?> class="bouton"> Retour </a> 
                        <?php
                    }
                    else {
                        $erreur = "La note doit être supérieure ou égale à 0.";
                        ?>
                            <a id="Bouton_retour" href=<?php echo $lien ?> class="bouton"> Retour </a> 
                        <?php
                        break;
                    }
                }
                else {
                    $erreur = "La note doit être inférieure ou égale à 10.";
                    ?>
                        <a id="Bouton_retour" href=<?php echo $lien?> class="bouton"> Retour </a> 
                    <?php
                    break;
                }
            }
            break;
    }
?>