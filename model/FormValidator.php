<?php

    namespace model;

    use Exception\UserException;

    /**
     * Permet de vérifier le formulaire
     * @author Morel Kouhossounon
     */
    class FormValidator
    {
        const MAX_FILE_SIZE = 2000000000000000;
        const NOT_CONFORM_PASSWORD = 'Les mots de passe ne sont pas conformes';

        /**
         * @throws UserException Si un champ n'est pas conforme
         */
        static function validateStudentAdd(): array
        {


            $fields = ['post' => ['name', 'surname', 'login', 'email', 'country', 'city', 'zipCode',
                'password', 'password-2'], 'files' => ['cv', 'photo']];
            define("VALID_CAPTCHA", isset($_POST['captcha']) && strtolower($_POST['captcha']) == strtolower($_SESSION['captcha']));
            print($_SESSION['captcha']);
            if (self::isAllFieldsPresent(...$fields)) {
                if (VALID_CAPTCHA) {
                    if ($_POST['password'] != $_POST['password-2']) {
                        throw new UserException(self::NOT_CONFORM_PASSWORD);
                    }

                    if (self::isAllFieldsSizeCorrect()) {

                        throw new UserException('La taille des elements ne doit pas depasser 20 lettres');
                    }
                    if (!self::isFileSizeIsLessThanTwo()) {
                        self::moveFiles('cv');
                        self::moveFiles('photo');
                    } else {
                        throw new UserException('La taille des fichiers ne doit pas depasser ne doit pas depasser 2 MO:' . '
Photo:' . $_FILES['photo']['size'] . 'CV:' . $_FILES['cv']['size']);
                    }
                } else {
                    throw new UserException('Captcha invalide');
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

            $fields = ['post' => ['name', 'surname', 'login', 'email', 'country', 'city', 'zipCode',
                'password-2', 'password'], 'files' => ['photo']];
            if (self::isAllFieldsPresent(...$fields)) {
                if (self::validCaptcha()) {
                    if ($_POST['password'] != $_POST['password-2']) {
                        throw new UserException(self::NOT_CONFORM_PASSWORD);
                    }
                    if (self::isAllFieldsSizeCorrect()) {

                        throw new UserException('La taille des elements ne doit pas depasser 20 lettres');
                    }
                    if (self::isFileSizeIsLessThanTwo()) {

                        throw new UserException('La taille des fichiers ne doit pas depasser ne doit pas depasser 2 MO:' . '
                    Photo:' . $_FILES['photo']['size'] . 'CV:' . $_FILES['cv']['size']);
                    } else {
                        self::moveFiles('photo');
                    }
                } else {
                    throw new UserException($_SESSION['captcha']);
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
            $module = [];
            $faculties = [];
            $data = $_POST;
            if (isset($_POST['photo'])) $data['photo'] = $_POST['photo'];

            if (isset($_POST['faculty'])) {
                foreach ($_POST['faculty'] as $faculty) {
                    $module['faculty'] = explode(' ', (explode(';', $faculty))[0])[0];
                    $module['facultyYear'] = explode(' ', (explode(';', $faculty))[0])[1];
                    $module['name'] = (explode(';', $faculty))[1];
                    $faculties[] = $module;
                }
                $data['faculty'] = $faculties;
            }
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
         * valide la modification d'un étudiant
         * @throws UserException
         */
        static function valideStudentUpdate(): array
        {
            if (self::validCaptcha()) {
                if ($_POST['password'] != $_POST['password-2']) {
                    throw new UserException(self::NOT_CONFORM_PASSWORD);
                }

                if (!empty(($_FILES['cv'])['name'])) {
                    self::moveFiles('cv');
                }
                if (!empty(($_FILES['photo'])['name'])) {
                    self::moveFiles('photo');
                }
                return self::generatedStudentFields();
            } else {
                throw new UserException('Captcha invalide');
            }

        }

        public static function moveFiles(string $file): void
        {

            $extension = pathinfo($_FILES["$file"]['name'])['extension'];
            $login = $_POST['login'];
            $url = ($file == 'cv') ? CV_URL : PIC_URL;
            $dir = ($file == 'cv') ? CV_DIR : PIC_DIR;
            $_POST["$file"] = $url . $login . '.' . $extension;
            $sucessMove = move_uploaded_file($_FILES["$file"]['tmp_name'], $dir . $login . '.' . $extension);

            if (!$sucessMove) {
                throw new UserException("Les fichiers non enregistré");
            }
        }

        /**
         * @throws UserException
         */
        public static function valideTeacherUpdate(): array
        {
            if (self::validCaptcha()) {
                if (!empty(($_FILES['photo'])['name'])) {
                    self::moveFiles('photo');
                }
                return self::generatedTeacherFields();
            } else {
                throw new UserException('Captcha invalide');
            }
        }

        private static function validCaptcha(): bool
        {
            return isset($_POST['captcha']) && strtolower($_POST['captcha']) == strtolower($_SESSION['captcha']);
        }

        /**
         * @throws UserException
         */
        public static function validateUpdateUserInformation(): array
        {

            if (empty($_POST['password']) || empty($_POST['login'])) {
                throw new UserException('Veuillez saisir des informations non vide');
            }
            return [$_POST['password'], $_POST['login']];
        }
    }

