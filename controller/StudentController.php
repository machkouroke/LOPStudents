<?php
    namespace controller\StudentController;
    Class StudentController {
        public \Closure $sendMessage;

        function __construct() {
            $this->sendMessage = function() {
                $title = 'Envoyer un message';
                $selectedUser = [];
                foreach($_POST['user'] as $user) {
                    $selectedUser[] = $user;
                }
                $selectedUser = implode(';', $selectedUser);
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\contacts.php');
            };
        }
    }

