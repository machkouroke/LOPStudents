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
        static function validateStudentAdd(string $type = 'add'): array
        {


            $fields = ['post' => ['name', 'surname', 'login', 'email', 'country', 'city', 'zipCode',
                'password', 'password-2'], 'files' => ['cv', 'photo']];
            if (self::isAllFieldsPresent(...$fields)) {

                if ($_POST['password'] != $_POST['password-2']) {
                    throw new UserException('Les mots de passe ne sont pas conformes');
                }

                if (self::isAllFieldsSizeCorrect()) {

                    throw new UserException('La taille des elements ne doit pas depasser 20 lettres');
                }
                if (self::isFileSizeIsLessThanTwo()) {


                    self::moveFile();
                } else {
                    throw new UserException($_SESSION['captcha']);
                }

            } else {
                throw new UserException('Veuillez saisir tous les champs');
            }


            return self::generatedStudentFields();
        }

        /**
         * @throws UserException
         */
        static function validateTeacherAdd(): array
        {
            /**
             * À écrire Morel
             */
            $fields = ['post' => ['name', 'surname', 'login', 'email', 'country', 'city', 'zipCode',
                'password-2', 'password'], 'files' => ['photo']];
            if (self::isAllFieldsPresent(...$fields)) {

                if ($_POST['password'] != $_POST['password-2']) {
                    throw new UserException('Les mots de passe ne sont pas conformes');
                }
                if (self::isAllFieldsSizeCorrect()) {

                    throw new UserException('La taille des elements ne doit pas depasser 20 lettres');
                }
                if (self::isFileSizeIsLessThanTwo()) {

                    throw new UserException('La taille des fichiers ne doit pas depasser ne doit pas depasser 2 MO');
                } else {

                    self::moveFile();
                }
            } else {
                throw new UserException('Veuillez saisir tous les champs');
            }


            return self::generatedTeacherFields();

        }

        /**
         * @return array Tableau avec tous les champs nécessaire à la création d'un étudiant
         */
        static private function generatedStudentFields(): array
        {
            $data = $_POST;
            if (isset($_POST['cv'])) $data['cv'] = $_POST['cv'];
            if (isset($_POST['photo'])) $data['photo'] = $_POST['photo'];
            $data['faculty'] = explode(' ', $_POST['faculty'])[0];
            $data['facultyYear'] = explode(' ', $_POST['faculty'])[1];
            return $data;
        }

        static private function generatedTeacherFields(): array
        {
            $data = $_POST;
            if (isset($_POST['photo'])) $data['photo'] = $_POST['photo'];
            return $data;
        }

        /**
         * Vérifie si tous les champs sont présents
         * @return bool Tous les champs sont présents ou non
         */
        private static function isAllFieldsPresent(array ...$fields): bool
        {
            foreach ($fields['post'] as $field) {
                if (!isset($_POST[$field])) {
                    return false;
                }
            }
            foreach ($fields['files'] as $file) {
                if (!isset($_FILES[$file])) {
                    return false;
                }
            }
            return true;
        }

        /**
         * Vérifie la taille des champs saisis
         * @return bool L'un des champs n'a pas une taille correcte ou non
         */
        private static function isAllFieldsSizeCorrect(): bool
        {


            return strlen($_POST['name']) > 20 ||
                strlen($_POST['login']) > 20 || strlen($_POST['password']) > 20;
        }

        /**
         * Vérifie si la taille des fichiers envoyée est correct
         * @return bool La taille d'un des fichiers est supérieur à 2 ou non
         */
        private static function isFileSizeIsLessThanTwo(): bool
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

        /**
         * valide la modification d'un etudiant
         * @throws UserException
         */
        static function valideStudentUpdate(): array
        {
            if ($_POST['password'] != $_POST['password-2']) {
                throw new UserException('Les mots de passe ne sont pas conformes');
            }

            if (!empty(($_FILES['cv'])['name'])) {
                self::moveUpdateFiles('cv');
            }
            if (!empty(($_FILES['photo'])['name'])) {
                self::moveUpdateFiles('photo');
            }

            return self::generatedStudentFields();
        }

        public static function moveUpdateFiles(string $file): void
        {

            $extension = pathinfo($_FILES["$file"]['name'])['extension'];
            echo $extension;
            $login = $_POST['login'];
            $url = ($file == 'cv') ? CV_URL : PIC_URL;
            $dir = ($file == 'cv') ? CV_DIR : PIC_DIR;
            $_POST["$file"] = $url . $login . '.' . $extension;
            $sucessMove = move_uploaded_file($_FILES["$file"]['tmp_name'], $dir . $login . '.' . $extension);

            if (!$sucessMove) {
                throw new UserException("Les fichiers non enregistré");
            }
        }
    }

