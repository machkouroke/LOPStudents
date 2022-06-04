<?php

    namespace model;

    use Exception\UserException;

    /**
     * Permet de vérifier le formulaire
     * @author Morel Kouhossounon
     */
    class FormValidator
    {
        const MAX_FILE_SIZE = 2000000000;

        /**
         * @throws UserException Si un champ n'est pas conforme
         */
        static function validateStudentAdd(): array
        {

            if (self::isAllStudentFieldsPresent()) {

                if (self::isAllStudentFieldsSizeCorrect()) {

                    throw new UserException('La taille des elements ne doit pas depasser 20 lettres');
                }
                if (self::isStudentFileSizeIsLessThanTwo()) {

                    throw new UserException('La taille des fichiers ne doit pas depasser ne doit pas depasser 2 MO');
                } else {

                    self::moveFile();
                }
            } else {
                throw new UserException('Veuillez saisir tous les champs');
            }


            return self::generatedStudentFields();
        }

        static function validateTeacherAdd(): array
        {
            /**
             * À écrire Morel
             */
            return [];
        }

        /**
         * @return array Tableau avec tous les champs nécessaire à la création d'un étudiant
         */
        static private function generatedStudentFields(): array
        {
            $data = $_POST;
            $data['cne'] = '14566';
            $data['cv'] = $_POST['cv'];
            $data['photo'] = $_POST['photo'];
            return $data;
        }

        /**
         * Vérifie si tous les champs sont présents
         * @return bool Tous les champs sont présents ou non
         */
        private static function isAllStudentFieldsPresent(): bool
        {
            return isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['login'])
                && isset($_POST['email']) && isset($_FILES['photo'])
                && isset($_FILES['cv']) && isset($_POST['country']) && isset($_POST['city']) && isset($_POST['zipCode'])
                && isset($_POST['faculty']);
        }

        /**
         * Vérifie la taille des champs saisis
         * @return bool L'un des champs n'a pas une taille correcte ou non
         */
        private static function isAllStudentFieldsSizeCorrect(): bool
        {


            return strlen($_POST['name']) > 20 ||
                strlen($_POST['login']) > 20 || strlen($_POST['password']) > 20;
        }

        /**
         * Vérifie si la taille des fichiers envoyée est correct
         * @return bool La taille d'un des fichiers est supérieur à 2 ou non
         */
        private static function isStudentFileSizeIsLessThanTwo(): bool
        {
            return $_FILES['photo']['size'] > self::MAX_FILE_SIZE && $_FILES['cv']['size'] > self::MAX_FILE_SIZE;
        }

        /**
         * @return void
         * @throws UserException
         */
        public static function moveFile(): void
        {
            $cvExtension = pathinfo($_FILES['cv']['name'])['extension'];
            $photoExtension = pathinfo($_FILES['photo']['name'])['extension'];
            $login = $_POST['login'];
            $_POST['cv'] = CV_URL . $login . '.' . $cvExtension;
            $_POST['photo'] = PIC_URL . $login . '.' . $photoExtension;

            $sucessMove = move_uploaded_file($_FILES['cv']['tmp_name'], CV_DIR . $login . '.' . $cvExtension)
                && move_uploaded_file($_FILES['photo']['tmp_name'], PIC_DIR . $login . '.' . $photoExtension);


            if (!$sucessMove) {

                throw new UserException("Les fichiers n'ont pas été bien enregistré");
            }
        }
    }

