<?php


    const BASE_URL = "/LOPStudents/";
    const CSS_URL = BASE_URL . "/view/assets/css/";
    const IMG_URL = BASE_URL . "/view/assets/img/";
    const JS_URL = BASE_URL . "/view/assets/js/";
    const VIEW_URL = BASE_URL . "/view/";
    const ASSETS_URL = BASE_URL . "/view/assets/";
    const INDEX_LOCATION = "Location:index.php";

    define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);
    if (isset($_SESSION['User'])) {
        define("ADMIN_ONLY", $_SESSION['User']->getRole() === 'admin');
        define("STUDENT_ONLY", $_SESSION['User']->getRole() === 'student');
        define("TEACHER_ONLY", $_SESSION['User']->getRole() === 'teacher');
        define("ADMIN_STUDENT", $_SESSION['User']->getRole() == 'admin' || $_SESSION['User']->getRole() == 'student');
        define("ADMIN_TEACHER", $_SESSION['User']->getRole() == 'admin' || $_SESSION['User']->getRole() == 'teacher');
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



