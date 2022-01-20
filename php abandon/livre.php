<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php  include("vues/v_bande.php");
            if(isset($_REQUEST['idlivre'])) {
                $id_livre = $_REQUEST['idlivre'];
            }
            include("class/class.connexionDAO.inc.php");
            $livre = new connexionDAO();
            $resultat = $livre->livreParID($id_livre);
        ?>
        <?php
            foreach ($resultat as $lelivre):
        ?>
        <div id="Couverture">
			<img src="images/livres/<?php echo $lelivre['id_livre'] ?>.jpg" width="250px" height="384px"
            />
		</div>
        <div id="Titre_Livre">
            <p>
                <?php
                    echo $lelivre['titre'];
                ?>
            </p>
        </div>
        <div id="Note_moyenne_livre">
        <p>Note du livre :</p>
            <p>
                <?php
                    echo $livre->noteMoyenne($lelivre['id_livre']);
                ?>
            </p>
        </div>
        <div id="information">
        <table id="tabInfosLivre" border="border-collapse:collapse">
            <thead>
                <tr>
                <th>Format</th>
                <th>Prix en €</th>
                <th>Exemplaires vendus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        <?php echo $lelivre['format_livre']; ?>
                    </th>
                    <th>
                        <?php echo $lelivre['prix_vente']; ?>
                    </th>
                    <th>
                        <?php echo $lelivre['exemplaires_vendus']; ?>
                    </th>
                </tr>
            </tbody>  
        </table>
        </div>
        <div id='Operations'>
                <table id='tab_operations'>
                    <thead>
                        <tr>
                        <th>Ventes totales en €</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th>
                            <?php    
                                $ventes=$lelivre['prix_vente']*$lelivre['exemplaires_vendus'];
                                echo $ventes;
                            ?>
                        </th>
                        </tr>
                    </tbody>
                </table>
        </div>
        <?php
            if(isset($_SESSION['user'])){
        ?>
        <div id="Noter_livre">
            <form id="form_noter" action="index.php?controleur=v_noter&action=noter&idretour=<?php echo $lelivre['id_livre'];?>" method="POST">
                <label><b>Noter le livre :</b></label>
                <input type="text" placeholder="Note entre 0 et 10" name="note" required>
                <input type="submit" id='v_note' value='Noter' name="formnoter">
            </form>
            <?php
                if(isset($erreur)){
                    echo '<font color="red">'.$erreur."</font>";
                }
            ?>
        <?php
        }
        ?>
        <?php
            if(!isset($_SESSION['user'])){
        ?>
        <div id="Pas_noter">
            <p>Veuillez vous connecter pour noter la série.</p>
        </div>
        <?php
        }
        ?>
        </div>
        <?php endforeach; ?>
    </body>
</html> 