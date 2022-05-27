<?php
require_once ('Model.php');
class Professeur extends Model
{
    public $mat,$nom,$prenom,$email,$pwd,$photo,$cv,$ville,$code_postal,$tel;
    public function __construct($mat,$nom,$prenom,$email,$pwd,$photo,$cv,$ville,$code_postal,$tel){
        $this->mat=$mat;
        $this->nom = $nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->pwd=$pwd;
        $this->code_postal = $code_postal;
        $this->tel=$tel;
        $this->cv=$cv;
        $this->photo=$photo;
        $this->ville=$ville;
    }
}