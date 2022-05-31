<?php
    $addFaculty = function() {
        $title = 'Ajouter un proffesseur';
        $type = 'pr';
        require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\addFaculty.php');
    };