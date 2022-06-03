<?php

    /**
     * Permet d'inclure le fichier juste à l'appel du namespace
     */
    spl_autoload_register(static function (string $path) {
        $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $path . '.php';
        require_once($path);
    });

    session_start();

    require_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller\Constant.php');
    use controller\MainController;

    use controller\AuthenticationController;
    use controller\MenuController;
    use controller\StudentController;
    use controller\TeacherController;
    use model\beans\Factory;


    if (isset($_SESSION['User'])) {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'addStudentPage':
                    MenuController::addStudent();
                    break;
                case 'addStudent':
                    StudentController::addStudent();
                    break;
                case 'addTeacherPage':
                    MenuController::addTeacher();
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
                    MainController::sendMessage();
                    break;
                case 'transferMessage':
                    MainController::transferMessage();
                    break;
                case 'userPage':
                    MenuController::userPage();
                    break;
                case 'studentByFaculty':
                    StudentController::getByFaculty();
                    break;
                case 'studentByYear':
                    StudentController::getByYear();
                    break;
                case 'studentByCity':
                    StudentController::getByCity();
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
            AuthenticationController::login();

        } else {
            AuthenticationController::loginPage();
        }

    }

