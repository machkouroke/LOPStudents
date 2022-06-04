<?php

    namespace model\LOPStudents\Trait;

    use model\LOPStudents\Teacher;
    use PDO;

    trait StudentSettersAndGetters
    {
        /**
         * @return string
         */
        public function getBirthDate(): string
        {
            return $this->birthDate;
        }

        /**
         * @return string
         */
        public function getCv(): string
        {
            return $this->cv;
        }


        /**
         * @return string
         */
        public function getEmail(): string
        {
            return $this->email;
        }

        /**
         * @return string
         */
        public function getCne(): string
        {
            return $this->cne;
        }

        /**
         * @return string
         */
        public function getFaculty(): string
        {
            return $this->faculty;
        }

        /**
         * @return string
         */
        public function getFacultyYear(): string
        {
            return $this->facultyYear;
        }

        /**
         * @param string $cne
         */
        public function setCne(string $cne): void
        {
            $this->cne = $cne;
        }
        /**
         * Renvoie les étudiants de même filière que l'étudiant actuel
         * @return bool|array Tableau avec les camarades de classe de l'étudiant actuelle
         */
        public function getFriends(): bool|array
        {
            $con = FACTORY->get_connexion();
            $sql = "select * from users NATURAL join etudiants 
                    where faculty='" . $this->faculty . "' and facultyYear='" . $this->facultyYear . "' and cne<>'" . $this->cne . "'";
            $res = $con->query($sql);
            return self::changeToStudent($res);
        }

        /**
         * Renvoie-les proffesseur de l'étudiant actuel
         * @return bool|array Tableau des proffesseur de l'étudiant actuel
         */
        public function getTeachers(): bool|array
        {
            $all = [];
            $con = FACTORY->get_connexion();
            $sql = "select * from professeur natural join users where matricule in (select matricule from module 
                                where faculty='$this->faculty' and facultyYear='$this->facultyYear')";
            $res = $con->query($sql);
            foreach ($res->fetchAll(PDO::FETCH_ASSOC) as $item) {
                $teacher = new Teacher(...$item);
                $all[] = $teacher;
            }
            return $all;
        }


        /**
         * Renvoie toutes les informations de l'étudiant actuel (En tant qu'Étudiant)
         * @return array Informations de l'étudiant actuel
         */
        public function getStudentTable(): array
        {
            return [$this->cne, $this->cv, $this->email, $this->birthDate,
                $this->faculty, $this->facultyYear, $this->login];
        }
    }