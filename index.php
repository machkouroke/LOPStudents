<?php
    session_start();
    require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller\constant.php');
    require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'AuthenticationController.php');
    require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'MenuController.php');
    require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'TeacherController.php');

    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'addStudent':
                loginRequired($addStudent);
                break;
            case 'addTeacher':
                if ($_GET['step'] == 1) {
                    loginRequired($addTeacher);
                } else if ($_GET['step'] == 2) {
                    loginRequired($addFaculty);
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
                login();
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
