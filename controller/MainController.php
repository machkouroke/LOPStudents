<?php

    namespace controller;


    use Exception\DataBaseException;
    use Exception\UserException;
    use model\FormValidator;
    use model\LOPStudents\Student;
    use model\LOPStudents\Teacher;
    use model\LOPStudents\User;

    /**
     * @author Machkour Oke
     * Contient les fonctions propres aux administrateurs, mais aussi quelque fonction paramétrique du programme
     */
    class MainController
    {
        /**
         * ouvre la page d'envoi d'un message
         */
        public static function sendMessage(): void
        {
            $sendMessage = function () {
                $title = 'Envoyer un message';
                $selectedUser = [];
                if (isset($_POST['user'])) {
                    foreach ($_POST['user'] as $user) {
                        $selectedUser[] = $user;
                    }
                    $selectedUser = implode(';', $selectedUser);
                    MenuController::sendMessagePage($selectedUser);
                    return;
                }
                MenuController::sendMessagePage();
            };
            $sendMessage();
        }

        /**
         * transfert le message
         */
        public static function transferMessage(): void
        {

            $sendMessage = function () {

                $isAllFieldsPresent = ((isset($_POST["destinataire"]) && !empty($_POST["destinataire"]))
                    && (isset($_POST["object"]) && !empty($_POST['object']))
                    && (isset($_POST['message']) && !empty($_POST['message'])));
                echo $isAllFieldsPresent;
                if ($isAllFieldsPresent) {

                    $dest = explode(";", $_POST["destinataire"]);
                    $subject = $_POST["object"];
                    $message = $_POST["message"];
                    $headers = "From: " . "machkour@LOPStudio.com";
                    foreach ($dest as $to) {
                        if (!mail($to, $subject, $message, $headers)) {
                            $_SESSION['error'] = "Une erreur est survenue lors de l'envoi du message";
                            header("Location:index.php?action=sendMessage&error");
                            return;

                        }
                    }
                } else {

                    $query = ['action' => 'sendMessage',
                        'error' => "Veuillez saisir tous les champs pour l'envoi",
                        'selectedUser' => $_POST['destinataire']];
                    header("Location:index.php?" . http_build_query($query));
                    return;

                }


                $query = ['action' => 'listingStudents',
                    'sucess' => 'Le message a bien été envoyé',
                    'page' => '1'];
                header("Location:index.php?" . http_build_query($query));
            };
            AuthenticationController::loginRequired($sendMessage)();
        }

        /**
         * Supprime le compte de l'utilisateur connecté
         */
        public static function deleteConnectedUser(): void
        {
            $_SESSION['User']->delete();
            session_destroy();
            header(INDEX_LOCATION);
        }
        public static function updateUserInformation(): void {
            try {

                $_SESSION['User']->changePassword(...FormValidator::validateUpdateUserInformation());
                $query = ['action' => 'settings', 'sucess' => 'Utilisateur modifié'];
                header(INDEX_LOCATION . '?' . http_build_query($query));
            } catch (DataBaseException | UserException $e) {
                $query = ['action' => 'settings',  'error' => $e->getMessage()];

                header(INDEX_LOCATION . '?' . http_build_query($query));
            }

        }


    }


