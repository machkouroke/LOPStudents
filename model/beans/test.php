<?php

use model\beans\Classe;
use model\beans\Etudiant;
use model\beans\Factory;
use model\beans\Module;
use model\beans\Professeur;

require_once ('Factory.php');
    require_once ('Etudiant.php');
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

//    $dataE = ['login'=>'ted','cv'=>'C/aba','photo'=>'C//sertr','email'=>'anayoo@gmail.com','birthDate'=>'1998-10-15','faculty'=>'IID','facultyYear'=>2,
//        'name'=>'CUIDIBI','surname'=>'Teddy','password'=>'ted','city'=>'Cotonou','zipCode'=>338,'country'=>'Benin'];
//      $etu1 = new Etudiant($fac, ...$dataE);
////    var_dump($etu1->cne);
//   $etu1->add();
    var_dump(Classe::getAll($fac));
//   header("Location:classe.php");