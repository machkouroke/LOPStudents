<?php

    namespace controller;

    use controller\AuthenticationController;


    /**
     * @author Machkour Oke
     * Contient les fonctions propres aux Proffesseur
     */
    class TeacherController
    {

        public static function addFaculty(): void
        {
            $addFaculty = function () {
                $title = 'Ajouter un proffesseur';
                $type = 'pr';
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\addFaculty.php');
            };
            AuthenticationController::loginRequired($addFaculty)();
        }
    }
