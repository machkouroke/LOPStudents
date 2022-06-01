<?php

use model\beans\Etudiant;
use model\beans\Factory;
use model\beans\Professeur;

require_once ('Factory.php');
    require_once ('Etudiant.php');
    require_once ('Professeur.php');
    require_once ('Module.php');
    $fac = new Factory('root','momo');
    $dataP = Professeur::getByMatricule('G342',$fac);
    $prof= new Professeur($fac, ...$dataP);
    $prof->changePassword('gazde');
//    $data = ['faculty'=>'IID','facultyYear'=>1,'matricule'=>'g345','name'=>'JEE'];
//    $mod = new \model\beans\Module(new Factory('root','momo'), ...$data);
//    $mod->delete();
    //header("Location:user.php");