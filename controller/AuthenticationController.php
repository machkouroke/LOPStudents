<?php

    namespace controller;

    use Closure;
    use Exception\DataBaseException;
    use Exception\UserException;
    use JetBrains\PhpStorm\NoReturn;
    use model\Authentification;
    use model\beans\Factory;

    class AuthenticationController
    {
        /**
         * @param Closure $action Action à autoriser uniquement à l'utilisateur connecté
         */
        public static function loginRequired(Closure $action): Closure | NoReturn
        {
            if (isset($_SESSION['User'])) {
                return $action;
            } else {
                header(INDEX_LOCATION);
            }
        }
        public static function roleRequired(Closure $action , bool $role) {
            if ($role) {
                $action();
            } else {
                header(INDEX_LOCATION);
            }
        }
        public static function loginPage() {
            require_once(BASE_DIR.'view\login.php');
        }
        public static function login(Factory $factory)
        {

            try {
                echo 'authenticate';
                $_SESSION['User'] = Authentification::authenticate($_POST['username'], $_POST['password'], $factory);
                header(INDEX_LOCATION);
            } catch (DataBaseException|UserException $e) {
                $error = $e->getMessage();
                header(INDEX_LOCATION.'?error=' . $error);

            }


        }

        public static function logout()
        {
            unset($_SESSION['User']);
            session_destroy();
            header(INDEX_LOCATION);
        }
    }
