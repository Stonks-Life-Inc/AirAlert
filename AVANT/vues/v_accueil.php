<div id="Titre_Page">
            <p>Bibliothèque en ligne</p>
</div>

<div id="Liste">
    <table id="tab_liste" border="border-collapse:collapse">
        <thead>
            <tr>
            <th>Titre livre</th>
            <th>Nom série</th>
            </tr>
        </thead>
    <tbody>
    <?php include_once 'class/class.connexionDAO.inc.php';
        $resultat = $laliste->createListe();
        foreach ($resultat as $ligne):
    ?>
        <tr>
        <td><a id="Bouton_livre" href="livre.php?idlivre=<?php echo $ligne['id_livre']; ?>" class="bouton"> <?php echo $ligne['titre']; ?> </a></td>
        <td><a id="Bouton_serie" href="serie.php?idserie=<?php echo $ligne['id_serie']; ?>" class="bouton"> <?php echo $ligne['nom']; ?> </a></td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
    </table>

</div>
