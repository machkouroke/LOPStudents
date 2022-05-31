<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'model\Authentification.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'model\beans\user.php');
    /**
     * @param Closure $action Action à autoriser uniquement à l'utilisateur connecté
     */
    function loginRequired(Closure $action)
    {
        if (isset($_SESSION['User'])) {
            $action();
        } else {
            require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\login.php');
        }
    }

    function login(Factory $factory)
    {
        echo 'authenticate';
        try {
            $_SESSION['User'] = authenticate($_POST['username'], $_POST['password'], $factory);
            header("Location:index.php");
        } catch (DataBaseException|UserException $e) {
            $error = $e->getMessage();
            require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'index.php');
        }


    }

    function logout()
    {
        unset($_SESSION['User']);
        session_destroy();
        header("Location:index.php");
    }