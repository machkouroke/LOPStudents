<?php

    namespace model\LOPStudents\Trait;

    use model\LOPStudents\Student;
    use PDO;

    trait TeacherSettersAndGetters
    {
        /**
         * @return mixed|string
         */
        public function getEmail(): mixed
        {
            return $this->email;
        }

        /**
         * @param mixed|string $email
         */
        public function setEmail(mixed $email): void
        {
            $this->email = $email;
        }
        /**
         * @return mixed|string
         */
        public function getMatricule(): mixed
        {
            return $this->matricule;
        }

        /**
         * @param mixed|string $matricule
         */
        public function setMatricule(mixed $matricule): void
        {
            $this->matricule = $matricule;
        }
        /**
         * Renvoie la liste des étudiants du proffesseur actuel
         * @return bool|array Liste des étudiants du professeur actuel
         */
        public function getStudents(): bool|array
        {
            $con = FACTORY->get_connexion();
            $sql = "select cne,name,surname,email,cv,photo,faculty,facultyYear from etudiants natural join users 
                                                           where (faculty,facultyYear) in (select
                        faculty,facultyYear from module where matricule='" . $this->matricule . "')";
            $res = $con->query($sql);
            return Student::changeToStudent($res);
        }

        public function getFaculties(){
            $allFac = [];
            $con = FACTORY->get_connexion();
            $sql = "select faculty,facultyYear from module where matricule='$this->matricule'";
            $res = ($con->query($sql))->fetchAll(PDO::FETCH_ASSOC);
            while ($line = $res){
                $faculty = $line['faculty'].' '.(string)$line['facultyYear'];
                $allFac[] = $faculty;
            }
            return $allFac;
        }

        /**
         * Renvoie les données du proffesseur actuel
         * @return array Données du proffesseur actuelle
         */
        public function getProfTable(): array
        {
            return [$this->getMatricule(),$this->email, $this->login];
        }

    }