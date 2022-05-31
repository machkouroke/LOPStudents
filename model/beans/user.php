<?php
require_once ('Factory.php');
abstract class user  {
    public string $login,$nom,$prenom,$pwd,$fonction;
    protected Factory $factory;

    public function __construct($login,$nom,$prenom,$pwd,$fonction,$factory){
        $this->login = $login;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->pwd = $pwd;
        $this->fonction = $fonction;
        $this->factory = $factory;
    }

    public static function getAll(Factory $factory){
        $conn = $factory->get_connexion();
        $sql = "SELECT * FROM users";
        $res = $conn->prepare($sql);
        $res->execute();
        return $res->fetchAll();
    }

    //public abstract function add();

    public abstract function update();

    public abstract function delete();

//    public function requestAddParams($request){
//        $request->bindParam(1,$this->login);
//        $request->bindParam(2,$this->nom);
//        $request->bindParam(3,$this->prenom);
//        $request->bindParam(4,$this->pwd);
//        $request->bindParam(5,$this->fonction);
//    }
//
//    public function requestUpdateParams($req){
//        $req->bindParam(5,$this->login);
//        $req->bindParam(1,$this->nom);
//        $req->bindParam(2,$this->prenom);
//        $req->bindParam(3,$this->pwd);
//        $req->bindParam(4,$this->fonction);
//    }

}
//user::getConnexion();
//$factory =  new Factory();
//$res = user::getAll($factory);
//var_dump($res);
//$user1 = new user('deo1','AGANON','Deodat','deo@','etudiant');
//$user6 = new user('deo1','AGANON ALEVIM','Deodat Nonvidome','deo@123','etudiant');
////$user1->add();
//$user2 = new user('ghazdalabd','Ghazdali','Abdelgani','abd@#','professeur');
//$user5 = new user('ghazdalabd','Ghazdali','Abdel gani','aewf#','professeur');
////$user2->add();
//$user3 = new user('candyahogo','AHO','Candy Nonvignon','cdywalst','etudiant');
//$user4 = new user('candyahogoudedji','AHO GOU','Candy Nonvi','cdywalst','etudiant');
//$user1->delete();