<?php

    namespace controller;

    use controller\AuthenticationController;

    class MenuController
    {
        public static function menu()
        {
            $menu = function () {
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\menu.php');
            };
            AuthenticationController::loginRequired($menu);
        }

        public static function addStudent()
        {
            $addStudent = function () {
                $title = 'Ajouter un étudiants';
                $type = 'etd';
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\addStudents.php');
            };
            AuthenticationController::loginRequired($addStudent);
        }

        public static function addTeacher()
        {
            $addTeacher = function () {
                $title = 'Ajouter un proffesseur';
                $type = 'pr';
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\addTeacherForm.php');
            };
            AuthenticationController::loginRequired($addTeacher);
        }

        public static function listingStudents()
        {
            $listingStudents = function () {
                $title = 'Liste des étudiants';
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\listing.php');
            };
            AuthenticationController::loginRequired($listingStudents);
        }

        public static function listingTeachers()
        {
            $listingTeachers = function () {
                $title = 'Liste des proffesseur';
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\listing.php');
            };
            AuthenticationController::loginRequired($listingTeachers);
        }

        public static function settings()
        {
            $settings = function () {
                $title = 'Liste des proffesseur';
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\settings.php');
            };
            AuthenticationController::loginRequired($settings);
        }
    }






