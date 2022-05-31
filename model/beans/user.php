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

    public static function getAll(Factory $factory): bool|array
    {
        $conn = $factory->get_connexion();
        $sql = "SELECT * FROM users";
        $res = $conn->prepare($sql);
        $res->execute();
        return $res->fetchAll();
    }

    public abstract function add();

    public abstract function update();

    public abstract function delete();



}
