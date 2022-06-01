<?php

use model\beans\Etudiant;
use model\beans\Factory;
use model\beans\Module;
use model\beans\Professeur;

require_once ('Factory.php');
    require_once ('Etudiant.php');
    require_once ('Professeur.php');
    require_once ('Module.php');
   $fac = new Factory('root','momo');
//    $dataP = Professeur::getByMatricule('G342',$fac);
//    $prof= new Professeur($fac, ...$dataP);
//    $prof->changePassword('gazde');
//    $data = ['faculty'=>'GRT','facultyYear'=>2,'matricule'=>'s32','name'=>'Prog web'];
//    $mod = new Module(new Factory('root','momo'), ...$data);
//    $mod->add();

    $dataE = Etudiant::getByCne('ENSA18003',$fac);
    $etu = new Etudiant($fac, ...$dataE);
    var_dump($etu->getProfs());
    //header("Location:classe.php");