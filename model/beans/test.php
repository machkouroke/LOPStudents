<?php

use model\beans\Etudiant;
use model\beans\Factory;
use model\beans\Module;
use model\beans\Professeur;

require_once ('Factory.php');
    require_once ('Etudiant.php');
    require_once ('Professeur.php');
    require_once ('Module.php');
    require_once('..\..\controller\constant.php');
    $dataE = ['login' => 'ted', 'cv' => 'C/aba', 'photo' => 'C//sertr', 'email' => 'anayoo@gmail.com', 'birthDate' => '1998-10-15', 'faculty' => 'IID', 'facultyYear' => 2,
        'name' => 'CUIDIBI', 'surname' => 'Teddy', 'password' => 'ted', 'city' => 'Cotonou', 'zipCode' => 338, 'country' => 'Benin', 'cne'=>'gg'];
    $etu1 = new Etudiant(\FACTORY, ...$dataE);
    $etu1->add();
    header('Location:classe.php');