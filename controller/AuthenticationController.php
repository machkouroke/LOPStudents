<?php
    /**
     * @param Closure $action action à autoriser uniquement à l'utilisateur connecté
     */
    function loginRequired(Closure $action) {
        if (isset($_SESSION['User'])) {
            $action();
        } else {
            require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\login.php');
        }
    }
    function login() {
        $_SESSION['User'] = 'machkour';
        header("Location:index.php");
    }
    function logout() {
        unset($_SESSION['User']);
        session_destroy();
        header("Location:index.php");
    }