<?php
require_once ('Model.php');
class Ville
{
    public $nom,$nomPays;


    public function __construct($nom,$nomPays)
    {
        $this->nom = $nom;
        $this->nomPays = $nomPays;
    }

}