<?php

    namespace model\beans;


    use PDO;
    use PDOException;

    abstract class Model
    {
        public static $connexion;
        public static $dns = 'mysql:host=localhost;dbname=students';
        public static $username = 'root';
        public static $password = 'momo';

        public static function getConnexion()
        {
            self::$connexion = null;
            try {
                self::$connexion = new PDO(self::$dns, self::$username, self::$password);
                self::$connexion->exec('set names utf8');
                self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "ERREUR : " . $e->getMessage();
            }
        }
    }