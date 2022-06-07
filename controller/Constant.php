<?php

    /**
     * @author Machkour Oke
     * Contient toutes les constantes essentielles au bon fonctionnement du programme
     */


    use controller\enum\Role;
    use model\LOPStudents\Factory;

    /**
     * Constante de répertoire d'url
     */
    const BASE_URL = "";
    const CSS_URL = BASE_URL . "/view/assets/css/";
    const IMG_URL = BASE_URL . "/view/assets/img/";
    const JS_URL = BASE_URL . "/view/assets/js/";
    const VIEW_URL = BASE_URL . "/view/";
    const ASSETS_URL = BASE_URL . "/view/assets/";
    const INDEX_LOCATION = "Location:index.php";
    const PIC_URL = BASE_URL . "/media/picture/";
    const CV_URL = BASE_URL . '/media/cv/';
    const MODEL_URL = BASE_URL . "/model/LOPStudents/";

    /**
     * Constant de répertoire local
     */
    const FACTORY = new Factory('mysql:host=localhost;dbname=lopstudents', 'root', 'claudine');
    define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);
    const MEDIA_DIR = BASE_DIR . DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR;
    const CV_DIR = MEDIA_DIR . 'cv' . DIRECTORY_SEPARATOR;
    const PIC_DIR = MEDIA_DIR . 'picture' . DIRECTORY_SEPARATOR;

    /**
     * Constante divers
     */
    const ROW_PER_PAGE = 9;
    /**
     * @return void
     */

    function formToCookie(): void
    {
        foreach ($_POST as $key => $input) {
            print($key . '=>' . $input . "<br>");
            setcookie($key, $input);
        }
    }

/**
 * fonction permettant d'afficher des logs sur la console
 * @param $message
 * @return void
 */
    function logging($message): void
    {
        if (gettype($message) == 'array' || gettype($message) == 'object') {
            echo "<script>console.log('" . json_encode($message) . "')</script>";
        } else {
            echo "<script>console.log('" . $message . "')</script>";
        }
    }

    /**
     * Constante de role
     */


    if (isset($_SESSION['User'])) {
        define("ADMIN_ONLY", $_SESSION['User']->getRole() === Role::Admin);
        define("STUDENT_ONLY", $_SESSION['User']->getRole() === Role::Student);
        define("TEACHER_ONLY", $_SESSION['User']->getRole() === Role::Teacher);
        define("ADMIN_STUDENT", $_SESSION['User']->getRole() == Role::Admin || $_SESSION['User']->getRole() == Role::Student);
        define("ADMIN_TEACHER", $_SESSION['User']->getRole() == Role::Admin || $_SESSION['User']->getRole() == Role::Teacher);
        if (ADMIN_ONLY) {
            define("LIST_OF_STUDENTS", 'Liste des étudiants');
            define("LIST_OF_TEACHERS", 'Liste des proffesseur');
        } else if (TEACHER_ONLY) {
            define("LIST_OF_STUDENTS", 'Liste de mes étudiants');
        } else if (STUDENT_ONLY) {
            define("LIST_OF_STUDENTS", 'Liste de mes camarades');
            define("LIST_OF_TEACHERS", 'Liste de mes proffesseur');
        }

    }



