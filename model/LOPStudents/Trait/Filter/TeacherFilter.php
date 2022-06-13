<?php

    namespace model\LOPStudents\Trait\Filter;
    use model\LOPStudents\Teacher;
    use PDO;

    trait TeacherFilter
    {
        /**
         * Renvoie le proffesseur avec le login donné
         * @param string $login
         * @return Teacher
         */
        public static function getByLogin(string $login): Teacher
        {
            $con = FACTORY->get_connexion();
            $sql = "SELECT * FROM professeur NATURAL JOIN users WHERE login='" . $login . "'";
            $res = $con->query($sql)->fetch(PDO::FETCH_ASSOC);
            return new Teacher(...$res);
        }

        /**
         * @param string $filterInput
         * @return array
         */
        public static function getByCity(string $city): array
        {
            $con = FACTORY->get_connexion();
            $sql = "SELECT * FROM professeur natural join users WHERE city='" . $city . "'";
            $res = $con->query($sql);
            return self::changeToTeacher($res);
        }

    }