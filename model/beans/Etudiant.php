<?php
require_once ('Model.php');
class Etudiant extends Model {

    public $nom,$prenom,$email,$pwd,$ville,$date_nais,$code_postal,$tel,$cv,$photo,$filiere,$niveau;

    public function __construct($nom,$prenom,$email,$pwd,$ville,$date_nais,$code_postal,$tel,$cv,$photo,$filiere,$niveau){
        $this->nom = $nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->pwd=$pwd;
        $this->ville=$ville;
        $this->date_nais=$date_nais;
        $this->code_postal = $code_postal;
        $this->tel=$tel;
        $this->cv=$cv;
        $this->photo=$photo;
        $this->filiere=$filiere;
        $this->niveau=$niveau;
    }


}
$b = new Etudiant('a','s','d','f','g','h','j','k','l','q','w','e');

