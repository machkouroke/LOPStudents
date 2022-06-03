<?php

    namespace controller;


    use model\beans\Student;

    /**
     * @author Machkour Oke
     * Contient les fonctions faisant appel aux éléments du menu
     */
    class MenuController
    {
        public static function menu(): void
        {
            $menu = function () {

                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\menu.php');
            };
            AuthenticationController::loginRequired($menu)();
        }

        public static function addStudent(): void
        {
            $addStudent = function () {
                $title = 'Ajouter un étudiants';
                $type = 'etd';
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\addStudents.php');
            };
            AuthenticationController::roleRequired(AuthenticationController::loginRequired($addStudent),
                ADMIN_ONLY);
        }

        public static function addTeacher(): void
        {
            $addTeacher = function () {
                $title = 'Ajouter un proffesseur';
                $type = 'pr';
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\addTeacherForm.php');
            };
            AuthenticationController::roleRequired(AuthenticationController::loginRequired($addTeacher),
                ADMIN_ONLY);
        }

        public static function listingStudents(): void
        {
            $listingStudents = function () {
                $title = LIST_OF_STUDENTS;
                $data = Student::getAll();
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\listing.php');
            };
            AuthenticationController::loginRequired($listingStudents)();
        }

        public static function listingTeachers(): void
        {
            $listingTeachers = function () {
                $title = LIST_OF_TEACHERS;
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\listing.php');
            };
            AuthenticationController::loginRequired($listingTeachers)();
        }

        public static function settings(): void
        {
            $settings = function () {

                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\settings.php');
            };
            AuthenticationController::loginRequired($settings)();
        }
    }






