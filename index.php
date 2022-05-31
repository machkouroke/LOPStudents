<?php

    /**
     * Permet d'inclure le fichier juste à l'appel du namespace
     */
    spl_autoload_register(static function(string $path) {
        $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $path . '.php';
        require_once ($path);
    });
    require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller\constant.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'AuthenticationController.php');
    require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'MenuController.php');
    require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'TeacherController.php');
    session_start();
    $factory = new Factory('root', 'claudine');
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'addStudent':
                loginRequired($addStudent);
                break;
            case 'addTeacher':
                if ($_GET['step'] == 1) {
                    loginRequired($addTeacher);
                } else if ($_GET['step'] == 2) {
                    controller\TeacherController\TeacherController::addFaculty();
                }

                break;
            case 'listingStudents':
                loginRequired($listingStudents);
                break;
            case 'listingTeachers':
                loginRequired($listingTeachers);
                break;
            case 'settings':
                loginRequired($settings);
                break;
            case 'login':
                login($factory);
                break;
            case 'logout':
                logout();
                break;
            default:
                $menu();
        }

    } else {
        loginRequired($menu);
    }
