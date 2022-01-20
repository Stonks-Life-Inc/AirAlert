<?php
include_once('class/class.gestionConnexion.inc.php');
include_once('class/class.utilisateur.inc.php');
include_once('class/class.note.inc.php');
class connexionDAO{
    private $_db;

    public function setDb(PDO $db)
    {
    $this->_db = $db;
    }
    public function __construct(){
        $monPDO=GestionConnexion::getConnexion();
        $this->setDb($monPDO);
    }

    /* Fonction */
    public function createListe() {
        $req = 'SELECT livre.titre,serie.nom,livre.id_livre,serie.id_serie,livre.id_serie FROM livre INNER JOIN serie ON livre.id_serie=serie.id_serie';
        $res=$this->_db->query($req);
        return $res;
    }
    
    public function livreParID($id) {
        $req = 'SELECT * FROM livre WHERE id_livre='.$id;
        $res=$this->_db->query($req);
        return $res;
    }

    public function serieParID($id) {
        $req = 'SELECT * FROM serie WHERE id_serie='.$id;
        $res=$this->_db->query($req);
        return $res;
    }

    public function nvUser($utilisateur) {
        $identifiant=$utilisateur->getIdentifiant();
        $mdp=$utilisateur->getMdp();
        $nom=$utilisateur->getNom();
        $prenom=$utilisateur->getPrenom();
        $req = "INSERT INTO lecteur(identifiant, mot_de_passe, nom, prenom) VALUES('.$identifiant.','.$mdp.','.$nom.','.$prenom.')";
        $res = $this->_db->exec($req);
        return $res;
    }

    public function searchUser($identifiant,$mdp) {
        $req="SELECT * FROM lecteur WHERE identifiant LIKE '.$identifiant.' AND mot_de_passe LIKE '.$mdp.'";
        $res=$this->_db->query($req);
        $nb=$res->rowCount();
        return $nb;
    }

    public function createUserSession($identifiant,$mdp) {
        $req="SELECT * FROM lecteur WHERE identifiant LIKE '.$identifiant.' AND mot_de_passe LIKE '.$mdp.'";
        $res=$this->_db->query($req);
        $userinfo=$res->fetch();
        $utilisateur = new utilisateur($userinfo['nom'],$userinfo['prenom'],$userinfo['identifiant'],$userinfo['mot_de_passe']);
        $utilisateur->setId($userinfo['id_lecteur']);
        return $utilisateur;
    }

    public function noterLivre($lanote) {
        $idlecteur=$lanote->getIdLecteur();
        $idlivre=$lanote->getIdLivre();
        $note=$lanote->getNote();
        $req="INSERT INTO `noter_livre` (`id_livre`, `id_lecteur`, `note_livre`) VALUES ($idlivre, $idlecteur, $note)";
        $res=$this->_db->exec($req);
        return $res;
    }

    public function noteMoyenne($idLivre) {
        $req="SELECT note_livre FROM noter_livre WHERE id_livre = '.$idLivre.'";
        $res=$this->_db->query($req);
        $notes=$res->fetchAll();
        $somme=0;
        $compteur=0;
        foreach ($notes as $note) {
            $somme = $note['note_livre'] + $somme;
            $compteur = $compteur + 1;
        }
        $moyenne = round($somme/$compteur,2);
        return $moyenne;
    }
}
?>

