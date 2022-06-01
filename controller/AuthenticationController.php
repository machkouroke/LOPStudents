<?php

    namespace controller;

    use Closure;
    use Exception\DataBaseException;
    use Exception\UserException;
    use model\Authentification;
    use model\beans\Factory;

    class AuthenticationController
    {
        /**
         * @param Closure $action Action à autoriser uniquement à l'utilisateur connecté
         */
        public static function loginRequired(Closure $action)
        {
            if (isset($_SESSION['User'])) {
                $action();
            } else {
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\login.php');
            }
        }

        public static function login(Factory $factory)
        {

            try {
                echo 'authenticate';
                $_SESSION['User'] = Authentification::authenticate($_POST['username'], $_POST['password'], $factory);
                header("Location:index.php");
            } catch (DataBaseException|UserException $e) {
                $error = $e->getMessage();
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'index.php');
            }


        }

        public static function logout()
        {
            unset($_SESSION['User']);
            session_destroy();
            header("Location:index.php");
        }
    }
