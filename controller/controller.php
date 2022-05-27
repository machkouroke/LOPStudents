<?php
    require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'controller\constant.php');

    function menu() {
        require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\menu.php');
    }
    function addStudent() {
        $title = 'Ajouter un étudiants';
        require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\add.php');
    }
    function addTeacher() {
        $title = 'Ajouter un proffesseur';
        require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\add.php');
    }
    function listingStudents() {
        $title = 'Liste des étudiants';
        require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\listing.php');
    }
    function listingTeachers() {
        $title = 'Liste des proffesseur';
        require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\listing.php');
    }
    function settings() {
        $title = 'Liste des proffesseur';
        require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\settings.php');
    }
