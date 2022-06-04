<?php

    namespace model\LOPStudents;

    use Exception\DataBaseException;
    use Exception\UserException;
    use model\LOPStudents\Module;
    use model\LOPStudents\Trait\Filter\TeacherFilter;
    use model\LOPStudents\Trait\TeacherSettersAndGetters;
    use PDOException;



    /**
     * @author Morel Kouhossounon
     * Représente un proffesseur
     */
    class Teacher extends User
    {
        public string $matricule, $email;
        use TeacherSettersAndGetters;
        use TeacherFilter;

        public function __construct(...$data)
        {
            $userTab = array('login' => $data['login'], 'name' => $data['name'], 'surname' => $data['surname'],
                'password' => $data['password'], 'city' => $data['city'], 'zipCode' => $data['zipCode'],
                'country' => $data['country'], 'role' => 'teacher');
            parent::__construct(...$userTab);
            $this->matricule = $data['matricule'];
            $this->email = $data['email'];
        }

        /**
         * Renvoie la liste de tous les proffesseur
         * @return bool|array Liste de tous les proffesseur
         */
        public static function getAll(int $first, int $last): bool|array
        {
            $con = FACTORY->get_connexion();
            $sql = "select * from professeur natural join users";
            $res = $con->query($sql);
            return $res->fetchAll();
        }


        public static function getNumberOfTeacher(): int
        {
            $con = FACTORY->get_connexion();
            $sql = 'SELECT COUNT(*) AS NB_TEACHER FROM professeur';
            $res = $con->query($sql);
            return (int)$res->fetch()['NB_TEACHER'];
        }


        /**
         * Ajoute le proffesseur de l'objet actuel
         * @throws DataBaseException Erreur de la base de données
         * @throws UserException Nom d'utilisateur non disponible
         */
        public function add(): void
        {
            try {
                $con = FACTORY->get_connexion();
                $userInfo = $this->getUserTable();

                $studentInfo = $this->getProfTable();

                $addUser = 'insert into users values (?,?,?,?,?,?,?,?)';
                $addStudent = "INSERT INTO professeur VALUES 
                            (?,?,?)";

                $statementUser = $con->prepare($addUser);
                $statementUser->execute($userInfo);
                $statementStudent = $con->prepare($addStudent);
                $statementStudent->execute($studentInfo);
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    throw new UserException("Le nom d'utilisateur existe déja");
                }
                throw new DataBaseException('Erreur :' . $e->getMessage());
            }
        }

        /**
         * Met à jour l'utilisateur actuel
         */
        public function update(): void
        {
            try {
                $con = FACTORY->get_connexion();
                $userTable = $this->getUserTable();
                array_shift($userTable);
                $userInfo = $userTable;
                $profTable = $this->getProfTable();
                array_shift($profTable);
                $profInfo = $profTable;

                $updateProf = "update professeur set email=?, login=? where matricule='" . $this->matricule . "'";

                $updateUser = "update users set name=?, surname=?, password=?, city=?,
                    zipCode=?, country=?, role=? where login in (select login from professeur where matricule='" .
                    $this->matricule . "')";

                $statementStudent = $con->prepare($updateUser);
                $statementStudent->execute($userInfo);
                $statementUser = $con->prepare($updateProf);
                $statementUser->execute($profInfo);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        /**
         * Supprime le proffesseur actuelle
         */
        public function delete(): void
        {
            $con = FACTORY->get_connexion();
            $deleteUser = "delete from users where login in (select login from professeur where matricule='" .
                $this->matricule . "')";
            $deleteProf = "delete from professeur where matricule ='" . $this->matricule . "'";
            $con->exec($deleteUser);
            $con->exec($deleteProf);
        }




    }