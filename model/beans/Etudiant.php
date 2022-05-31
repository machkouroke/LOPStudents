<?php

require_once ('user.php');
class Etudiant  extends user {
    public string $date_nais,$pays,$tel,$cv,$photo,$filiere;
    public int $niveau;


    public function __construct($nom,$prenom,$date_nais,$pays,$tel,$cv,$photo,$filiere,$niveau,$login,$pwd,$factory){
        parent::__construct($login,$nom,$prenom,$pwd,'etudiant',$factory);
        $this->pays=$pays;
        $this->date_nais=$date_nais;
        $this->tel=$tel;
        $this->cv=$cv;
        $this->photo=$photo;
        $this->filiere=$filiere;
        $this->niveau=$niveau;
    }
    //methode pour recuperer tous les etudiants de la base de donnees
    public static function getAll(Factory $factory){
        $con = $factory->get_connexion();
        $sql = 'SELECT * FROM etudiants NATURAL JOIN users';
        $res = $con->query($sql);
        return $res->fetchAll();
    }
    //reherche de l'etudiant selon l'id
    public static function getById($id,Factory $factory){
        $con = $factory->get_connexion();
        $sql = "SELECT * FROM etudiants NATURAL JOIN users WHERE id='".$id."'";
        $res = $con->query($sql);
        return $res->fetch();
    }

    //recherche selon l'age
    public static function getByAge($age,Factory $factory){
        $con = $factory->get_connexion();
        $sql = "SELECT * FROM etudiants NATURAL JOIN users WHERE TIMESTAMPDIFF(year, date_nais , NOW())='".$age."'";
        $res = $con->query($sql);
        return $res->fetchAll();
    }
    //recherche des etudiants selon la classe
    public static function getByClasse(string $fil,int $niv,Factory $factory){
        $con = $factory->get_connexion();
        $sql = "SELECT * FROM etudiants natural join users WHERE filiere='".$fil."' AND niveau='".$niv."'";
        $res = $con->query($sql);
        return $res->fetchAll();
    }
    //recherche selon la ville
    public static function getByPays($pays,Factory $factory){
        $con = $factory->get_connexion();
        $sql = "SELECT * FROM etudiants natural join users WHERE pays='".$pays."'";
        $res = $con->query($sql);
        return $res->fetchAll();
    }
    //fonction d'ajout d'un etudiant
    public function add(){
        try{

            $con = $this->factory->get_connexion();
            $tab1 = [$this->login,$this->nom,
                $this->prenom,$this->pwd,$this->fonction];
            $tab2 = [$this->cv,$this->photo,$this->date_nais,$this->tel,
                $this->pays,$this->filiere,$this->niveau,$this->login];

            $sql1 = 'insert into users values (?,?,?,?,?)';
            $sql2 = "INSERT INTO etudiants (id,cv,photo,date_nais,
                       telephone,pays,filiere,niveau,login) VALUES 
                            (null,'$this->cv','$this->photo','$this->date_nais','$this->tel',
                '$this->pays','$this->filiere','$this->niveau','$this->login')";
            //$req1 = $con->prepare($sql1);
            $req2 = $con->exec($sql2);


            //$req1->execute($tab1);
            echo 'ajout';
            //$req2->execute($tab2);
            echo 'Ajout reussi';
        }catch (PDOException $e){echo 'erreur'.$e->getMessage();}

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

$fac = new Factory();
//var_dump(Etudiant::getAll($fac));

//Etudiant::getConnexion();
//$res = Etudiant::getByPays('Benin');
//var_dump($res);
//$etu1 = new Etudiant('AGANON','Deodat','2001-06-16','Benin','0629662148','C://cv/d','C://photo/d','IID',1,'deo123','deo@',$fac);
//$etu2 = new Etudiant('AHO','Candy','2002-04-27','Benin','0651238502','C://cv/c','C://photo/c','IID',1,'wolf','cdywalst',$fac);
//$etu3 = new Etudiant('ILBOUDO','Yacinthe','2001-05-16','Burkina-Faso','0614235678','C://cv/y',"C://p/y","GPEE",1,'perice','yasco@#',$fac);
$etu4 = new Etudiant('KOUHOSSOUNON','Vianney','2003-01-23','Benin','0629614725','C://cv/m','C://photo/m','IID',1,'momo123','momo@#',$fac);
$etu4->add();
//var_dump(Etudiant::getByClasse('GPEE',1));
?>
