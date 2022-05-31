<?php

class Factory{

    public $dns, $username, $password;
    public $connexion;

    public function __construct($username, $password){
        $this->dns = 'mysql:host=localhost;dbname=students';
        $this->username = $username;
        $this->password = $password;
        try{
            $this->connexion = new PDO($this->dns,$this->username,$this->password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            die('Erreur de connexion '.$e->getMessage());
        }
    }
    public function get_connexion(): PDO
    {
        return $this->connexion;
    }
    public function __destruct(){
        $this->connexion = null;
    }
}