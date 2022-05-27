<?php
require_once ('Model.php');
class Pays extends Model
{
    public $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

}