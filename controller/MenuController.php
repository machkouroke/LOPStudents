<?php


    $menu = function () {
        require($_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR .'view\menu.php');
    };
    $addStudent = function () {
        $title = 'Ajouter un étudiants';
        $type = 'etd';
        require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\addStudents.php');
    };
    $addTeacher =  function () {
        $title = 'Ajouter un proffesseur';
        $type = 'pr';
        require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\addTeacherForm.php');
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
