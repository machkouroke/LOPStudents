<?php

    namespace controller;

    class AdminController
    {
        public static function transferMessage()
        {

            $sendMessage = function ()  {
                $isAllFieldsPresent = isset($_POST["destinataire"]) && isset($_POST["object"]) && isset($_POST["message"]);
                if ($isAllFieldsPresent) {

                    $dest = explode(";", $_POST["message"]);
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
            AuthenticationController::loginRequired($sendMessage);
        }
    }


