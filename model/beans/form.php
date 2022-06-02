<?php

    use Exception\UserException;

    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['login'])
        && isset($_POST['email']) && isset($_FILES['photo'])
        && isset($_FILES['cv']) && isset($_POST['country']) && isset($_POST['city']) && isset($_POST['zipCode'])
        && isset($_POST['faculty'])) {

        if (strlen($_POST['nom']) > 20 ||
            strlen($_POST['login']) > 15 || strlen($_POST['password']) > 8) {
            throw new UserException('La taille des elements ne doit pas depasser 20 lettres');
        }
        if (filesize($_FILES['photo']) > 2 && filesize($_POST['cv']) > 2) {
            throw new UserException('La taille des fichiers ne doit pas depasser ne doit pas depasser 2 MO');
        } else {
            $login = $_POST['login'];
            $_POST['cv'] = CV_DIR . $login;
            $_POST['photo'] = PIC_DIR . $login;
            move_uploaded_file($_FILES['photo']['tmp_name'], $_POST['cv']);
            move_uploaded_file($_FILES['cv']['tmp_name'], $_POST['photo']);
        }
    } else {
        echo "Tous les champs ne sont remplis";
    }
