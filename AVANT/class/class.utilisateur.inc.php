<?php
    class utilisateur
    {
        private $id;
        private $identifiant;
        private $mdp;
        private $nom;
        private $prenom;

        public function __construct() {
            $this->identifiant=func_get_arg(0);
            $this->mdp=func_get_arg(1);
            $this->nom=func_get_arg(2);
            $this->prenom=func_get_arg(3);
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id=$id;
        }

        public function setIdentifiant($identifiant) {
            $this->identifiant=$identifiant;
        }

        public function getIdentifiant() {
            return $this->identifiant;
        }

        public function setMdp($mdp) {
            $this->mdp=$mdp;
        }

        public function getMdp() {
            return $this->mdp;
        }

        public function setNom($nom) {
            $this->nom=$nom;
        }

        public function getNom() {
            return $this->nom;
        }

        public function setPrenom($prenom) {
            $this->prenom=$prenom;
        }

        public function getPrenom() {
            return $this->prenom;
        }

    }
    
?>