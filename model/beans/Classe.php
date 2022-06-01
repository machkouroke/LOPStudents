<?php
    namespace model\beans;


    class Classe extends Model
    {
        public $filiere, $niveau;

        /**
         * @param $filiere
         * @param $niveau
         */
        public function __construct($filiere, $niveau)
        {
            $this->filiere = $filiere;
            $this->niveau = $niveau;
        }


        /**
         * @return mixed
         */
        public function getFiliere()
        {
            return $this->filiere;
        }

        /**
         * @return mixed
         */
        public function getNiveau()
        {
            return $this->niveau;
        }


    }