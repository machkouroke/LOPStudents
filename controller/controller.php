<?php

    require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'controller\constant.php');


    /**
     * @param Closure $action action à autoriser uniquement aux utilisateur connecté
     */
    function loginRequired(Closure $action) {
        if (isset($_SESSION['User'])) {
            $action();
        } else {
            $action();
        }
    }
    $menu = function () {
        require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\menu.php');
    };
    $addStudent = function () {
        $title = 'Ajouter un étudiants';
        require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\add.php');
    };
    $addTeacher =  function () {
        $title = 'Ajouter un proffesseur';
        require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\add.php');
    };
    $listingStudents =  function () {
        $title = 'Liste des étudiants';
        require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\listing.php');
    };
    $listingTeachers =  function () {
        $title = 'Liste des proffesseur';
        require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\listing.php');
    };
    $settings = function () {
        $title = 'Liste des proffesseur';
        require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\settings.php');
    };
