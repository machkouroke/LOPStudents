<?php

    namespace model\beans;

    use Exception\DataBaseException;
    use Exception\UserException;
    use PDO;
    use PDOException;
    use controller\Role;


    /**
     * @author Morel Kouhossounon
     * Représente un proffesseur
     */
    class Professeur extends User
    {
        public string $matricule, $email;

        public function __construct($factory, ...$data)
        {
            $userTab = array('login' => $data['login'], 'name' => $data['name'], 'surname' => $data['surname'],
                'password' => $data['password'], 'city' => $data['city'], 'zipCode' => $data['zipCode'],
                'country' => $data['country'], 'role' => 'teacher');
            parent::__construct($factory, ...$userTab);
            $this->matricule = $data['matricule'];
            $this->email = $data['email'];
        }

        /**
         * Renvoie la liste de tous les proffesseur
         * @return bool|array Liste de tous les proffesseur
         */
        public static function getAll(): bool|array
        {
            $con = FACTORY->get_connexion();
            $sql = "select * from professeur natural join users";
            $res = $con->query($sql);
            return $res->fetchAll();
        }

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
        public function delete()
        {
            $con = FACTORY->get_connexion();
            $deleteUser = "delete from users where login in (select login from professeur where matricule='" .
                $this->matricule . "')";
            $deleteProf = "delete from professeur where matricule ='" . $this->matricule . "'";
            $con->exec($deleteUser);
            $con->exec($deleteProf);
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
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }


        /**
         * Renvoie les données du proffesseur actuel
         * @return array Données du proffesseur actuelle
         */
        public function getProfTable(): array
        {
            return [$this->matricule, $this->email, $this->login];
        }
    }