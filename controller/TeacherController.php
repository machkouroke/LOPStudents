<?php
    namespace controller\TeacherController;
    use controller\AuthenticationController;

    require_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'AuthenticationController.php');

    Class TeacherController {

        public static function addFaculty()
        {
            $addFaculty = function() {
                $title = 'Ajouter un proffesseur';
                $type = 'pr';
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\addFaculty.php');
            };
            AuthenticationController::loginRequired($addFaculty);
        }
    }
