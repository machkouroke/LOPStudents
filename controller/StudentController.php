<?php

    namespace controller;

    use controller\AuthenticationController;

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
    }

