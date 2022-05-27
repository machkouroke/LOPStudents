<?php
        $cd = "mysql:host=localhost;dbname=projetweb";
        $username = "root";
        $password = "momo";
        $_connexion = null;
        try{
            $_connexion = new PDO($cd,$username,$password);
            $_connexion->exec('set names utf8');
            echo 'connexion etablie';
        }catch (PDOException $e){
            echo 'ERREUR : '.$e->getMessage();
        }
?>
