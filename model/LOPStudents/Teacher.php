<?php

    namespace model\LOPStudents;

    use Exception\DataBaseException;
    use Exception\UserException;
    use model\LOPStudents\Module;
    use model\LOPStudents\Trait\Filter\TeacherFilter;
    use model\LOPStudents\Trait\TeacherSettersAndGetters;
    use PDO;
    use PDOException;



    /**
     * @author Morel Kouhossounon
     * Représente un proffesseur
     */
    class Teacher extends User
    {
        public string $matricule, $email;
        public array $faculty;
        use TeacherSettersAndGetters;
        use TeacherFilter;

        public function __construct(...$data)
        {
            $userTab = array('login' => $data['login'], 'name' => $data['name'], 'surname' => $data['surname'],
                'password' => $data['password'], 'city' => $data['city'], 'zipCode' => $data['zipCode'],
                'country' => $data['country'],'photo'=>$data['photo'], 'role' => 'teacher');
            parent::__construct(...$userTab);
            $this->matricule = (isset($data['matricule']))? $data['matricule'] : $this->generateMatricule();
            $this->email = $data['email'];
            $this->faculty = (isset($data['faculty']))? $data['faculty'] : [];
        }

        /**
         * genere le matricule du prof au cours de son ajout
         * @return int|mixed
         */
        public function generateMatricule(): mixed
        {
            $con = FACTORY->get_connexion();
            $res = $con->query('select max(id)+1 from professeur')->fetch(PDO::FETCH_ASSOC);
            return 220000+($res['max(id)+1'] != null ? $res['max(id)+1'] : 1);
        }

        /**
         * @param $res
         * @return array
         */
        public static function changeToTeacher($res): array
        {
            $all = [];
            foreach ($res->fetchAll(PDO::FETCH_ASSOC) as $item) {
                $teacher = new Teacher(...$item);
                $all[] = $teacher;
            }
            return $all;
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
            return self::changeToTeacher($res);
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

                $addUser = 'insert into users values (?,?,?,?,?,?,?,?,?)';
                $addStudent = "INSERT INTO professeur (matricule,email,login) VALUES 
                            (?,?,?)";

                $statementUser = $con->prepare($addUser);
                $statementUser->execute($userInfo);
                $statementStudent = $con->prepare($addStudent);
                $statementStudent->execute($studentInfo);
                if(!empty($this->faculty)){
                    $this->addModule(...$this->faculty);
                }
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    throw new UserException("Le nom d'utilisateur existe déja");
                }
                throw new DataBaseException('Erreur :' . $e->getMessage());
            }
        }

        public function addModule(...$data){
            foreach ($data as $module){
                $module['matricule'] =$this->getMatricule();
                $moduleToAdd = new Module(...$module);
                $moduleToAdd->add();
            }
        }

        /**
         * Met à jour l'utilisateur actuel
         */
        public function update(string ...$newData): void
        {
            $tableUser = ['login', 'name', 'surname', 'password', 'city', 'zipCode', 'country', 'photo'];
            $tableProf = ['matricule', 'login'];
            try {
                $con = FACTORY->get_connexion();

                foreach ($newData as $key => $value) {
                    if (in_array($key, $tableUser)) {
                        $con->exec("update users set $key = '$value' where login='$this->login'");
                    }
                    if (in_array($key, $tableProf)) {
                        $con->exec("update professeur set $key = '$value' where login='$this->login'");
                    }
                }
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
            $deleteUser = "delete from users where login ='$this->login'";
            $deleteProf = "delete from professeur where login='$this->login'";
            $con->exec($deleteUser);
            $con->exec($deleteProf);
        }

    }