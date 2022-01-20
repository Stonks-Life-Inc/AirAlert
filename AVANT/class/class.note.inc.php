<?php
    class note
    {
        private $idlecteur;
        private $idlivre;
        private $note;

        public function __construct() {
            $this->note=func_get_arg(0);
        }

        public function setIdLecteur($idlecteur) {
            $this->idlecteur=$idlecteur;
        }

        public function getIdLecteur() {
            return $this->idlecteur;
        }

        public function setIdLivre($idlivre) {
            $this->idlivre=$idlivre;
        }

        public function getIdLivre() {
            return $this->idlivre;
        }

        public function setNote($note) {
            $this->note=$note;
        }

        public function getNote() {
            return $this->note;
        }
    }
    
?>