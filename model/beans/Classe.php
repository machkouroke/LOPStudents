<?php
    namespace model\beans;


    class Classe extends Model
    {
        public $filiere, $niveau;

        public function __construct($filiere, $niveau)
        {
            $this->filiere = $filiere;
            $this->niveau = $niveau;
        }

    }