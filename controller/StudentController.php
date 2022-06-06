<?php

    namespace controller;

    use controller\enum\Filter;
    use Exception\DataBaseException;
    use Exception\UserException;
    use model\LOPStudents\Student;
    use model\FormValidator;

    /**
     * @author Machkour Oke
     * Contient les fonctions propres aux étudiants
     */
    class StudentController
    {


        public static function addStudent(): void
        {
            try {
                formToCookie();
                $studentToAdd = new Student(...FormValidator::validateStudentAdd());
                $studentToAdd->add();
                $query = ['action' => 'addStudentPage', 'sucess' => 'Utilisateur ajoute'];
                header(INDEX_LOCATION . '?' . http_build_query($query));
            } catch (DataBaseException|UserException $e) {
                $query = ['action' => 'addStudentPage', 'error' => $e->getMessage()];
                header(INDEX_LOCATION . '?' . http_build_query($query));

            }

        }

        public static function delete(): void
        {
            Student::getByLogin($_GET['login'])->delete();
            $query = ['action' => 'listingStudents', 'page' => 1, 'sucess' => 'Utilisateur supprime'];
            header(INDEX_LOCATION . '?' . http_build_query($query));
        }

        public static function getByCity(): void
        {
            MenuController::listingStudents(Filter::CITY, $_POST['city']);

        }

        public static function getByFaculty(): void
        {
            MenuController::listingStudents(Filter::FACULTY, $_POST['faculty']);

        }

        public static function getByYear(): void
        {
            MenuController::listingStudents(Filter::YEAR, $_POST['year']);

        }

        /**
         * Appelle la page de mise à jour des données qui est en faite une page7
         * d'ajout avec les données de l'utilisateur à modifier
         */
        public static function updateStudentPage(): void
        {
            MenuController::addStudent(Student::getByLogin($_GET['login']), 'updateStudent&login=' . $_GET['login']);
        }

        /**
         * Cette méthode va se charger de communiquer avec le model pour mettre à jour les informations de l'utilisateur
         */
        public static function updateStudent(): void
        {

            try {
                formToCookie();

                $studentToUpdate = Student::getByLogin($_GET['login']);
                $studentToUpdate->update(...FormValidator::valideStudentUpdate());
                $query = ['action' => 'updateStudentPage', 'login' => $_GET['login'], 'sucess' => "Utilisateur modifié"];
                header(INDEX_LOCATION . '?' . http_build_query($query));

            } catch (DataBaseException|UserException  $e) {
                $query = ['action' => 'updateStudentPage', 'login' => $_GET['login'], 'error' => $e->getMessage()];
                header(INDEX_LOCATION . '?' . http_build_query($query));
            }
        }


    }

