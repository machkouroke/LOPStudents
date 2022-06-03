<?php

    namespace controller;


    use model\beans\Student;
    use model\beans\Teacher;
    use model\beans\User;



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

        public static function listingStudents(Filter $filter = FILTER::NONE, string $filterInput = ''): void
        {

            $listingStudents = function () use ($filterInput, $filter) {
                $title = LIST_OF_STUDENTS;
                $number = Student::getNumberOfStudents();

                $numberOfPage = ceil($number / ROW_PER_PAGE);

                $firstPage = ($_GET['page'] * ROW_PER_PAGE) - ROW_PER_PAGE;
                if (STUDENT_ONLY) {
                    $data = $_SESSION['User']->getFriends();
                } else {
                    $data = match ($filter) {
                        FILTER::CITY => Student::getByCity($filterInput),
                        FILTER::YEAR => Student::getByAge((int)$filterInput),
                        FILTER::FACULTY => Student::getByFaculty($filterInput),
                        default => Student::getAll($firstPage, ROW_PER_PAGE),
                    };
                }


                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\listing.php');
            };
            AuthenticationController::loginRequired($listingStudents)();
        }

        public static function listingTeachers(Filter $filter = FILTER::NONE, string $filterInput = ''): void
        {
            $listingTeachers = function () use ($filterInput, $filter) {
                $title = LIST_OF_TEACHERS;
                $number = Teacher::getNumberOfTeacher();
                $numberOfPage = ceil($number / ROW_PER_PAGE);
                $firstPage = ($_GET['page'] * ROW_PER_PAGE) - ROW_PER_PAGE;
                if (STUDENT_ONLY) {
                    $data = $_SESSION['User']->getTeachers();
                } else {
                    $data = match ($filter) {
                        FILTER::CITY => Teacher::getByCity($filterInput),
                        default => Teacher::getAll($firstPage, ROW_PER_PAGE),
                    };
                }
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

        public static function userPage(): void
        {

            $userPage = function () {
                $user = isset($_GET['userLogin']) ? Student::getByLogin($_GET['userLogin']) : $_SESSION['User'];
                $title = $user->getSurname();
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\userPage.php');
            };
            AuthenticationController::loginRequired($userPage)();
        }
    }






