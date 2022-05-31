<?php
    session_start();
    require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'controller.php');
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'addStudent':
                loginRequired($addStudent);
                break;
            case 'addTeacher':
                loginRequired($addTeacher);
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
