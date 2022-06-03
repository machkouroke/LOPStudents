<?php

use model\beans\Faculty;
use model\beans\Student;
use model\beans\Factory;
use model\beans\Module;
use model\beans\Teacher;

require_once ('Factory.php');
    require_once('Student.php');
    require_once('Teacher.php');
    require_once ('Module.php');

    require_once('Faculty.php');
   $fac = new Factory('root','momo');
//    $dataP = Teacher::getByMatricule('G342',$fac);
//    $prof= new Teacher($fac, ...$dataP);
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

