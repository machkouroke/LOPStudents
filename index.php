<?php

    /**
     * Permet d'inclure le fichier juste à l'appel du namespace
     */
    spl_autoload_register(static function (string $path) {
        $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $path . '.php';
        require_once($path);
    });
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller\constant.php');

    use controller\AdminController;
    use controller\AuthenticationController;
    use controller\MenuController;
    use controller\StudentController;
    use controller\TeacherController\TeacherController;
    use model\beans\Factory;


    $factory = new Factory('root', 'claudine');
    if (isset($_SESSION['User'])) {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'addStudent':
                    MenuController::addStudent();
                    break;
                case 'addTeacher':
                    if ($_GET['step'] == 1) {
                        MenuController::addTeacher();
                    } else if ($_GET['step'] == 2) {
                        TeacherController::addFaculty();
                    }

                    break;
                case 'listingStudents':
                    MenuController::listingStudents();
                    break;
                case 'listingTeachers':
                    MenuController::listingTeachers();
                    break;
                case 'settings':
                    MenuController::settings();
                    break;
                case 'sendMessage':
                    StudentController::sendMessage();
                    break;
                case 'transferMessage':
                    AdminController::transferMessage();
                    break;
                case 'userPage':
                    StudentController::userPage();
                    break;

                case 'logout':
                    AuthenticationController::logout();
                    break;
                default:
                    MenuController::menu();
            }

        } else {
            MenuController::menu();
        }
    } else {
        if (isset($_GET['action']) && $_GET['action'] == 'login') {
            AuthenticationController::login($factory);

        } else {
            AuthenticationController::loginPage();
        }

    }

