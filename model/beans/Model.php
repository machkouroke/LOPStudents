<?php
//require_once ('connexion.php');


abstract class Model
{
    public static $connexion;
    public static $dns = 'mysql:host=localhost;dbname=students';
    public static $username = 'root';
    public static $password = 'momo';

    public static function getConnexion()
    {
        echo 'getconnexion';
        self::$connexion = null;
        try {
            self::$connexion = new PDO(self::$dns, self::$username, self::$password);
            self::$connexion->exec('set names utf8');
            self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo 'Connexion etablie';
        } catch (PDOException $e) {
            echo "ERREUR : " . $e->getMessage();
        }
    }