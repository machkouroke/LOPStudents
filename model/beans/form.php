<?php
    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['login'])
                && isset($_POST['login']) && isset($_POST['email']) && isset($_FILES['photos'])
                && isset($_FILES['cv']) && isset($_POST['country']) && isset($_POST['city']) && isset($_POST['postale'])
        && isset($_POST['studyField'])){

        if(strlen($_POST['nom'])>20 || strlen($_POST['surname'])>20
            || strlen($_POST['login'])>15 || strlen($_POST['password'])>8){
            throw new LenException('La taille des elements ne doit pas depasser 20 lettres');
        }
        if(filesize($_FILES['photos'])>2 && filesize($_POST['cv'])>2){
            throw new SizeException('La taille des fivhiers ne doit pas depasser ne doit pas depasser 2 MO');
        }
    }else{
        echo "Tous les champs ne sont remplis";
    }
?>
