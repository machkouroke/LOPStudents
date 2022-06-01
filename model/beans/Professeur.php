<?php
    require_once('user.php');

    class Professeur extends user
    {
        public string $mat,  $ville, $code_postal, $tel;

        public function __construct($mat, $nom, $prenom, $login, $pwd, $ville, $code_postal, $tel, $factory)
        {
            parent::__construct($login,$nom,$prenom,$pwd,"professeur",$factory);
            $this->mat = $mat;
            $this->code_postal = $code_postal;
            $this->ville = $ville;
        }

        public function update()
        {
            // TODO: Implement update() method.
        }

        public function delete()
        {
            // TODO: Implement delete() method.
        }
    }