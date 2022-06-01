<?php

use model\beans\Etudiant;
use model\beans\Factory;

require_once ('Factory.php');
    require_once ('Etudiant.php');

    $data = ['login'=>'ted','cne'=>'ENSA18002','cv'=>'C://teddy/te','photo'=>'C:ghjnk/te','email'=>'teddy@gmail.com',
        'birthDate'=>'1998-03-01','faculty'=>'IID','facultyYear'=>2,
        'name'=>'GUIDIBI','surname'=>'Teddy Sedjro','password'=>'ted@$','city'=>'Cotonou','zipCode'=>299,'country'=>'Benin'];
    $etu = new Etudiant(new Factory('root','momo'), ...$data);
    var_dump($etu->getFriends());
    //header("Location:user.php");