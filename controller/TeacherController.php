<?php

    namespace controller;

    use controller\AuthenticationController;
    use Exception\DataBaseException;
    use Exception\UserException;
    use model\LOPStudents\Module;
    use model\LOPStudents\Student;
    use model\LOPStudents\Teacher;
    use model\FormValidator;


    /**
     * @author Machkour Oke
     * Contient les fonctions propres aux Proffesseur
     */
    class TeacherController
    {

        public static function addFaculty(): void
        {
            $addFaculty = function () {
                $title = 'Ajouter un proffesseur';
                $type = 'pr';
                require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view\addFaculty.php');
            };
            AuthenticationController::loginRequired($addFaculty)();
        }
        public static function addTeacher(): void
        {
            try {

                $f = (FormValidator::validateTeacherAdd());
                $teacherToAdd = new Teacher(...$f);
                $teacherToAdd->add();
                foreach ($f['faculty'] as $module){

                    $module['matricule'] =$teacherToAdd->getMatricule();
                    $moduleToAdd = new Module(...$module);
                    $moduleToAdd->add();
                }

                header(INDEX_LOCATION . '?action=addTeacherPage&sucess=' . 'Utilisateur ajoute');
            } catch (DataBaseException|UserException $e) {
                header(INDEX_LOCATION . '?action=addTeacherPage&error=' . $e->getMessage());
            }

        }
    }
