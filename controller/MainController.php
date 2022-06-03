<?php

    namespace controller;

    /**
     * @author Machkour Oke
     * Contient les fonctions propres aux administrateurs, mais aussi quelque fonction paramétrique du programme
     */
    class MainController
    {
        /**
         * Envoie un message
         */
        public static function sendMessage(): void
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

        public static function transferMessage(): void
        {

            $sendMessage = function () {
                $isAllFieldsPresent = isset($_POST["destinataire"]) && isset($_POST["object"]) && isset($_POST["message"]);
                if ($isAllFieldsPresent) {

                    $dest = explode(";", $_POST["destinataire"]);
                    $subject = $_POST["object"];
                    $message = $_POST["message"];
                    $headers = "From: " . "machkour@LOPStudio.com";
                    foreach ($dest as $to) {
                        if (!mail($to, $subject, $message, $headers)) {
                            $error = "Une erreur est survenue lors de l'envoi du message";
                            header("Location:index.php?action=sendMessage&error=" . $error);
                        }
                    }
                } else {
                    $error = "Veuillez saisir tous les champs pour l'envoi";
                    header("Location:index.php?action=sendMessage&error=" . $error);
                }
                $sucess = 'Le message a bien été envoyé';
                header("Location:index.php?action=listingStudents&sucess=" . $sucess);
            };
            AuthenticationController::loginRequired($sendMessage)();
        }


    }


