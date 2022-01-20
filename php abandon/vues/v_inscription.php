<div id="Titre_Page">
    <p>Inscription</p>
</div>

<div id="bloc_inscription">
    <!-- zone d'inscription -->
    <form id="form_inscription" action="index.php?controleur=v_inscription&action=inscription" method="POST">
        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required id="i_utilisateur" value="<?php if(isset($username)) { echo $username; } ?>">

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required id="i_mdp">

        <label><b>Confirmation du mot de passe</b></label>
        <input type="password" placeholder="Confirmez votre mot de passe" name="password2" required id="i_c_mdp">

        <label><b>Nom</b></label>
        <input type="text" placeholder="Entrer votre nom" name="nom" required id="i_nom" value="<?php if(isset($nom)) { echo $nom; } ?>">

        <label><b>Prénom</b></label>
        <input type="text" placeholder="Entrer votre prénom" name="prenom" required id="i_prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>">

        <input type="submit" id='v_inscription' value='Inscription' name="forminscription">

    </form>
    <?php
        if(isset($erreur)){
            echo '<font color="red">'.$erreur."</font>";
        }
    ?>
</div>