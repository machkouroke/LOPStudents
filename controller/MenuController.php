<?php

    namespace controller;


    use controller\enum\Filter;
    use model\LOPStudents\Factory;
    use model\LOPStudents\Faculty;
    use model\LOPStudents\Student;
    use model\LOPStudents\Teacher;
    use model\LOPStudents\User;


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


        public static function addStudent(Student $userToUpdate = null, string $action = 'addStudent'): void
        {


            $addStudent = function () use ($userToUpdate, $action) {

                $title = !isset($userToUpdate) ? 'Ajouter un étudiants' : "Mettre à jour l'étudiant";
                $type = 'etd';
                $instructions = "Veuillez saisir les informations de l'étudiants";
                $picture = true;
                $image = 'menu\addStudent.png';
                $faculties = Faculty::getAll();

                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\addStudents.php');
            };
            AuthenticationController::roleRequired(AuthenticationController::loginRequired($addStudent),
                ADMIN_ONLY);
        }

        public static function addTeacher(Teacher $userToUpdate = null, string $action = 'addTeacher'): void
        {

            $addTeacher = function () use ($action, $userToUpdate) {

                $title = !isset($userToUpdate) ? 'Ajouter un proffesseur' : "Mettre à jour le proffesseur";
                $type = 'pr';
                $instructions = "Veuillez saisir les informations du proffesseur";
                $faculties = Faculty::getAll();
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\addTeacherForm.php');
            };
            AuthenticationController::roleRequired(AuthenticationController::loginRequired($addTeacher),
                ADMIN_ONLY);
        }

        /**
         * Effectue une liste des étudiants selon un filtre donné par défaut tous les étudiants sont retourné
         * @param Filter $filter Filtre de recherche (Par ville, filière et age)
         * @param string $filterInput Entré voulu selon le filtre donnés
         */
        public static function listingStudents(Filter $filter = FILTER::NONE, string $filterInput = ''): void
        {

            $listingStudents = function () use ($filterInput, $filter) {
                $title = LIST_OF_STUDENTS;
                $number = Student::getNumberOfStudents();
                $numberOfPage = ceil($number / ROW_PER_PAGE);
                $firstPage = ($_GET['page'] * ROW_PER_PAGE) - ROW_PER_PAGE;
                if (STUDENT_ONLY) {
                    $data = $_SESSION['User']->getFriends();
                } else if (TEACHER_ONLY) {
                    $data = $_SESSION['User']->getStudents();
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

        /**
         * effectue le listing des professeurs
         * @param Filter $filter
         * @param string $filterInput
         * @return void
         */
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

        /**
         * page de parametres
         */
        public static function settings(): void
        {
            $settings = function () {

                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\settings.php');
            };
            AuthenticationController::loginRequired($settings)();
        }

        /**
         * ouvre la page de l'utilisateur
         */
        public static function userPage(): void
        {

            $userPage = function () {
                $user = isset($_GET['userLogin']) ? Student::getByLogin($_GET['userLogin']) : $_SESSION['User'];
                $title = $user->getSurname();
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\userPage.php');
            };
            AuthenticationController::loginRequired($userPage)();
        }

        /**
         * @param string|null $selectedUser
         * ouvre la page d'envoi des messages
         */
        public static function sendMessagePage(string $selectedUser = null): void
        {
            $contact = function () use ($selectedUser) {

                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\contacts.php');
            };
            AuthenticationController::loginRequired($contact)();
        }
    }






