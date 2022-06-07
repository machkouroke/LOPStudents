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

        public static function updateTeacherPage(): void
        {
            MenuController::addTeacher(Teacher::getByLogin($_GET['login']), 'updateTeacher&login=' . $_GET['login']);
        }

        public static function updateTeacher(): void
        {

            try {
                formToCookie();
                $studentToUpdate = Teacher::getByLogin($_GET['login']);
                $studentToUpdate->update(...FormValidator::valideTeacherUpdate());
                $query = ['action' => 'updateTeachertPage', 'login' => $_GET['login'], 'sucess' => 'Utilisateur modifié'];
                header(INDEX_LOCATION . '?' . http_build_query($query));

            } catch (DataBaseException|UserException  $e) {
                $query = ['action' => 'updateTeacherPage', 'login' => $_GET['login'], 'error' => $e->getMessage()];
                header(INDEX_LOCATION . '?' . http_build_query($query));
            }
        }
    }
