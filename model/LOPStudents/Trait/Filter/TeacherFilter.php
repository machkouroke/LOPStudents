<?php

    namespace model\LOPStudents\Trait\Filter;
    use PDO;

    trait TeacherFilter
    {
        /**
         * Renvoie le proffesseur avec le Matricule donné
         * @param string $matricule Matricule dudit professeur
         * @return mixed
         */
        public static function getByMatricule(string $matricule): mixed
        {
            $con = FACTORY->get_connexion();
            $sql = "SELECT * FROM professeur NATURAL JOIN users WHERE matricule='" . $matricule . "'";
            $res = $con->query($sql);
            return $res->fetch(PDO::FETCH_ASSOC);
        }

        /**
         * @param string $filterInput
         * @return void
         */
        public static function getByCity(string $filterInput): void
        {
        }

    }