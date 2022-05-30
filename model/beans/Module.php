<?php
    require_once('Model.php');

    class Module extends Model
    {
        public $filiere, $niveau, $matP, $nom;

        public function __construct($filiere, $niveau, $matP, $nom)
        {
            $this->filiere = $filiere;
            $this->niveau = $niveau;
            $this->matP = $matP;
            $this->nom = $nom;
        }
    }