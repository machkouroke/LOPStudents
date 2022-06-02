<?php

    namespace controller;

    use Exception\DataBaseException;
    use model\beans\Student;

    /**
     * @author Machkour Oke
     * Contient les fonctions propres aux étudiants
     */
    class StudentController
    {

        public static function sendMessage()
        {
            $sendMessage = function () {
                $title = 'Envoyer un message';
                $selectedUser = [];
                foreach ($_POST['user'] as $user) {
                    $selectedUser[] = $user;
                }
                $selectedUser = implode(';', $selectedUser);
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\contacts.php');
            };
            AuthenticationController::loginRequired($sendMessage)();
        }

        public static function userPage()
        {
            $title = $_SESSION['User']->getSurname();
            $userPage = function () {
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\userPage.php');
            };
            AuthenticationController::loginRequired($userPage)();
        }

        public static function addStudent()
        {
            print('<pre>');
            print_r($_POST);
            print("</pre>");
            $data = $_POST;
            $data['cne'] = '14566';
            $data['cv'] = $_FILES['cv']['name'];
            $data['photo'] = $_FILES['photo']['name'];
            $data['faculty'] = 'IID';
            $data['facultyYear'] = '1';
            $studentToAdd = new Student(FACTORY, ...$data);
            try {
                $studentToAdd->add();

                header(INDEX_LOCATION . '?action=addStudentPage&sucess=' . 'Utilisateur ajoute');
            } catch (DataBaseException $e) {
                header(INDEX_LOCATION . '?action=addStudentPage&error=' . $e->getMessage());
            }

        }
    }

