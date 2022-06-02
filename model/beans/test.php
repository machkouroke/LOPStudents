<?php

use model\beans\Classe;
use model\beans\Student;
use model\beans\Factory;
use model\beans\Module;
use model\beans\Professeur;

require_once ('Factory.php');
    require_once('Student.php');
    require_once ('Professeur.php');
    require_once ('Module.php');

    require_once ('Classe.php');
   $fac = new Factory('root','momo');
//    $dataP = Professeur::getByMatricule('G342',$fac);
//    $prof= new Professeur($fac, ...$dataP);
//    $prof->changePassword('gazde');
//    $data = ['faculty'=>'IID','facultyYear'=>2,'matricule'=>'s332','name'=>'Java'];
//    $mod = new Module(new Factory('root','momo'), ...$data);
//    $mod->add();

    $dataE = ['login'=>'deo','cv'=>'C/cdy','photo'=>'C//cdyp','email'=>'anayoo@gmail.com','birthDate'=>'2002-10-15','faculty'=>'IID','facultyYear'=>2,
        'name'=>'AGANON','surname'=>'Deodat','password'=>'deo','city'=>'Cotonou','zipCode'=>458,'country'=>'Benin'];
      $etu1 = new Student($fac, ...$dataE);
//    var_dump($etu1->cne);
   $etu1->add();

 header("Location:classe.php");

