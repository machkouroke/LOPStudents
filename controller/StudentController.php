<?php

    namespace controller;

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
            AuthenticationController::loginRequired($sendMessage);
        }
        public static function userPage() {
            $title = $_SESSION['User']->getSurname();
            $userPage = function() {
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\userPage.php');
            };
            AuthenticationController::loginRequired($userPage);
        }
    }

