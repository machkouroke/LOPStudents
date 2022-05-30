<?php
//require_once ('connexion.php');

abstract class Model
{
    public static $connexion;
    public static $dns = 'mysql:host=localhost;dbname=projetweb';
    public static string $username = 'root';
    public static $password = 'momo';

    public static function getConnexion(){
        self::$connexion = null;
        try{
            self::$connexion = new PDO(self::$dns,self::$username,self::$password);
            self::$connexion->exec('set names utf8');
            //echo 'Connexion etablie';
        }catch (PDOException $e){echo "ERREUR : ".$e->getMessage();}

    }
}
?>