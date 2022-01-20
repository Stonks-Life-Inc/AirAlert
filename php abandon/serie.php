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
            if(isset($_REQUEST['idserie'])) {
                $id_serie = $_REQUEST['idserie'];
            }
            include("class/class.connexionDAO.inc.php");
            $serie = new connexionDAO();
            $resultat = $serie->serieParID($id_serie);
        ?>
        <?php
            foreach ($resultat as $laserie):
        ?>
        <div id="Titre_Livre">
            <p>
                <?php
                    echo $laserie['nom'];
                ?>
            </p>
        </div>
        <div id="information">
        <table id="tabInfosLivre" border="border-collapse:collapse">
            <thead>
                <tr>
                <th>Nombres de livres de la série</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        <?php echo $laserie['nb_livre_serie']; ?>
                    </th>
                </tr>
            </tbody>  
        </table>
        </div>
        <?php endforeach; ?>
    </body>
</html> 