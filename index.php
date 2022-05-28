<?php
    require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'controller' . DIRECTORY_SEPARATOR. 'controller.php');
    if(isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'addStudent':
                $addStudent();
                break;
            case 'addTeacher':
                $addTeacher();
                break;
            case 'listingStudents':
                $listingStudents();
                break;
            case 'listingTeachers':
                $listingTeachers();
                break;
            case 'settings':
                $settings();
                break;
            default:
                $menu();
        }


    } else {
        $menu();
    }
