<?php

class Factory{

    public $dns, $username, $password;

    public function __construct(){
        $this->dns = 'mysql:host=localhost;dbname=students';
        $this->username = 'root';
        $this->password = 'momo';
    }
    public function get_connexion(): PDO
    {
        try{
            $connexion = new PDO($this->dns,$this->username,$this->password);
//            $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//            $connexion->exec('set names utf8');
            return $connexion;
        }catch (PDOException $e){
            echo 'Erreur de connexion '.$e->getMessage();
        }

    }
}