<div id="Titre_Page">
    <p>Connexion</p>
</div>

<div id="bloc_connexion">
    <!-- zone de connexion -->
    
    <form id="form_connexion" action="index.php?controleur=v_connexion&action=connexion" method="POST">
        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="usernameconnect" required>

        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="passwordconnect" required>
        <input type="submit" id='v_connexion' value='Connexion' name="formconnexion">
    </form>
    <?php
        if(isset($erreur)){
            echo '<font color="red">'.$erreur."</font>";
        }
    ?>
</div>