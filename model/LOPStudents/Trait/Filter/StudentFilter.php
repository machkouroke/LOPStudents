<?php

    namespace model\LOPStudents\Trait\Filter;
    use model\LOPStudents\Student;
    use PDO;

    trait StudentFilter
    {
        /**
         * Recherche un étudiant en fonction de son CNE
         * @param String $cne Cne de l'étudiant à rechercher
         * @return Student Étudiant avec le CNE données
         */
        public static function getByCne(string $cne): Student
        {
            $con = FACTORY->get_connexion();
            $sql = "SELECT * FROM etudiants NATURAL JOIN users WHERE cne='" . $cne . "'";
            $res = ($con->query($sql))->fetch(PDO::FETCH_ASSOC);
            $student = new Student(...$res);
            $student->setCne($res['cne']);
            return $student;
        }

        public static function getByLogin(string $login): Student
        {

            $con = FACTORY->get_connexion();
            $sql = "select * from etudiants natural join users where login='" . $login . "'";
            $res = ($con->query($sql))->fetch(PDO::FETCH_ASSOC);
            $student = new Student(...$res);
            $student->setCne($res['cne']);
            return $student;
        }

        /**
         * Recherche les étudiants avec un âge donné
         * @param int $age Age voulu des étudiants
         * @return Student|array Liste des étudiants avec l'age donné
         */
        public static function getByAge(int $age): Student|array
        {
            $con = FACTORY->get_connexion();
            $sql = "SELECT * FROM etudiants NATURAL JOIN users WHERE TIMESTAMPDIFF(year, birthDate , NOW())='" . $age . "'";
            $res = $con->query($sql);
            return self::changeToStudent($res);
        }

        /**
         * Recherche les étudiants selon une classe donnée
         * @param string $fac
         * @return bool|array
         */
        public static function getByFaculty(string $fac): bool|array
        {

            $fac = explode(' ', $fac);
            $faculty = ($fac)[0];
            $facultyYear = ($fac)[1];
            $con = FACTORY->get_connexion();
            $sql = "SELECT * FROM etudiants natural join users WHERE faculty='" . $faculty . "' AND facultyYear='" . $facultyYear . "'";
            $res = $con->query($sql);
            return self::changeToStudent($res);
        }

        /**
         * Recherche les étudiants selon une ville donnée
         * @param string $city
         * @return bool|array Tableau d'étudiant dans la ville donné
         */
        public static function getByCity(string $city): bool|array
        {
            $con = FACTORY->get_connexion();
            $sql = "SELECT * FROM etudiants natural join users WHERE city='" . $city . "'";
            $res = $con->query($sql);
            return self::changeToStudent($res);
        }
    }