<?php
    require_once('Model.php');

    class Classe extends Model
    {
        public $filiere, $niveau;

        public function __construct($filiere, $niveau)
        {
            $this->filiere = $filiere;
            $this->niveau = $niveau;
        }

    }