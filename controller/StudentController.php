<?php

    namespace controller;

    use Exception\DataBaseException;
    use Exception\UserException;
    use model\beans\Student;
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
                $studentToAdd = new Student(FACTORY, ...FormValidator::validateStudentAdd());
                $studentToAdd->add();
                header(INDEX_LOCATION . '?action=addStudentPage&sucess=' . 'Utilisateur ajoute');
            } catch (DataBaseException|UserException $e) {
                header(INDEX_LOCATION . '?action=addStudentPage&error=' . $e->getMessage());
            }

        }

        public static function delete(): void
        {

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
    }

