<?php
    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['login'])
                && isset($_POST['email']) && isset($_FILES['photo'])
                && isset($_FILES['cv']) && isset($_POST['country']) && isset($_POST['city']) && isset($_POST['zipCode'])
        && isset($_POST['faculty'])){

        if(strlen($_POST['nom'])>20 ||
            strlen($_POST['login'])>15 || strlen($_POST['password'])>8){
            throw new LenException('La taille des elements ne doit pas depasser 20 lettres');
        }
        if(filesize($_FILES['photo'])>2 && filesize($_POST['cv'])>2){
            throw new SizeException('La taille des fichiers ne doit pas depasser ne doit pas depasser 2 MO');
        }else{
            $login = $_POST['login'];
            $cvTmpName = $_FILES['cv']['tmp_name'];
            $photoTmpName = $_FILES['photo']['tmp_name'];
            $cvfolder = 'cv/';
            $photoFolder = 'photos/';
            $_POST['cv'] = "$cvfolder/$login";
            $_POST['photo'] = "$photoFolder/$login";
            move_uploaded_file($cvTmpName,$_POST['cv']);
            move_uploaded_file($photoTmpName,$_POST['photo']);
        }
    }else{
        echo "Tous les champs ne sont remplis";
    }
?>
