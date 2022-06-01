<?php
    require_once ('Factory.php');
    require_once ('Etudiant.php');
    $classe = new Classe('GRT',2);
    $etu = new Etudiant('NOUGBODE','Anael','1994-11-01','Ab-CAl',299,'Benin','C://df','C:ghjnk',$classe,'anna01','ui@#',new Factory('root','momo'));
    $etu->add();
    header("Location:user.php");