<?php

    namespace controller;

    use Exception\DataBaseException;
    use Exception\UserException;
    use model\beans\Student;
    use model\FormValidator;

    /**
     * @author Machkour Oke
     * Contient les fonctions propres aux étudiants
     */
    class StudentController
    {




        public static function userPage(): void
        {
            $title = $_SESSION['User']->getSurname();
            $userPage = function () {
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\userPage.php');
            };
            AuthenticationController::loginRequired($userPage)();
        }

        public static function addStudent(): void
        {
            try {
                $studentToAdd = new Student(FACTORY, ...FormValidator::validateStudentAdd());
                $studentToAdd->add();
                header(INDEX_LOCATION . '?action=addStudentPage&sucess=' . 'Utilisateur ajoute');
            } catch (DataBaseException|UserException $e) {
                header(INDEX_LOCATION . '?action=addStudentPage&error=' . $e->getMessage());
            }

        }
    }

