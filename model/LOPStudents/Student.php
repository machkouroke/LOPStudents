<?php


    namespace model\LOPStudents;


    use Exception\DataBaseException;
    use Exception\UserException;
    use model\LOPStudents\Trait\Filter\StudentFilter;
    use model\LOPStudents\Trait\StudentSettersAndGetters;
    use PDO;
    use PDOException;


    /**
     * @author Morel Kouhossounon
     * Classe Représentant un étudiant
     */
    class Student extends User
    {
        public string $birthDate, $cv, $email, $cne;
        public string $faculty, $facultyYear;
        use StudentSettersAndGetters;
        use StudentFilter;


        public function __construct(string ...$data)
        {
            $userTab = array('login' => $data['login'], 'name' => $data['name'], 'surname' => $data['surname'],
                'password' => $data['password'], 'city' => $data['city'], 'zipCode' => $data['zipCode'],
                'country' => $data['country'], 'photo' => $data['photo'], 'role' => 'student');

            parent::__construct(...$userTab);

            $this->birthDate = $data['birthDate'];
            $this->cv = $data['cv'];
            $this->faculty = $data['faculty'];
            $this->facultyYear = $data['facultyYear'];
            $this->email = $data['email'];
            $this->cne = (isset($data['cne'])) ? $data['cne'] : $this->generateCne();
        }


        /**
         * Génère le CNE suivant le dernier element de la base
         */
        public function generateCne(): string
        {
            $con = FACTORY->get_connexion();
            $res = $con->query('select max(id)+1 from etudiants')->fetch(PDO::FETCH_ASSOC);
            $id = 220000 + ($res['max(id)+1'] != null ? $res['max(id)+1'] : 1);
            return 'ENSA' . (string)$id;
        }

        /**
         * Renvoie une partie de la liste de tous les étudiants en jointure avec leur utilisateur correspondant
         * @param int $first Premier element de la liste
         * @param int $last Dernier de la liste
         * @return bool|array Liste des éléments telle que x appartient à [$first, $last]
         */
        public static function getAll(int $first, int $last): bool|array
        {
            $con = FACTORY->get_connexion();
            $sql = 'SELECT * FROM etudiants NATURAL JOIN users ORDER BY NAME DESC LIMIT ' . $first . ',' . $last;
            $res = $con->query($sql);
            return self::changeToStudent($res);
        }

        public static function getNumberOfStudents(): int
        {
            $con = FACTORY->get_connexion();
            $sql = 'SELECT COUNT(*) AS NB_STUDENTS FROM etudiants NATURAL JOIN users ORDER BY NAME DESC LIMIT 1';
            $res = $con->query($sql);

            return (int)$res->fetch()['NB_STUDENTS'];
        }


        /**
         * @param $res
         * @return array
         */
        public static function changeToStudent($res): array
        {
            $all = [];
            foreach ($res->fetchAll(PDO::FETCH_ASSOC) as $item) {
                $student = new Student(...$item);
                $all[] = $student;
            }
            return $all;
        }

        /**
         * Fonction d'ajout d'un étudiant
         * @throws DataBaseException Erreur de connexion à la base de données
         * @throws UserException Nom d'utilisateur non disponible
         */
        public function add()
        {
            try {

                $con = FACTORY->get_connexion();
                $userInfo = $this->getUserTable();
                $studentInfo = $this->getStudentTable();
                $addUser = 'insert into users values (?,?,?,?,?,?,?,?,?)';
                $addStudent = "INSERT INTO etudiants  VALUES 
                            (NULL,?,?,?,?,?,?,?)";
                $statementUser = $con->prepare($addUser);

                $statementUser->execute($userInfo);

                $statementStudent = $con->prepare($addStudent);

                $statementStudent->execute($studentInfo);

            } catch (PDOException $e) {

                if ($e->getCode() == 23000) {
                    throw new UserException("Le nom d'utilisateur existe déja");
                }

                throw new DataBaseException('Erreur: ' . $e->getMessage());

            }

        }

        /**
         * Fonction de mise à jour de l'étudiant actuelle
         * @param string ...$newData Contient les nouvelles données pour la mise à jour de l'utilisateur
         * @throws DataBaseException Lors d'une erreur de mise à joue
         */
        public function update(string ...$newData): void
        {
            $tableUser = ['login', 'name', 'surname', 'password', 'city', 'zipCode', 'country', 'photo'];
            $tableStudent = ['cv', 'email', 'birthDate', 'faculty', 'facultyYear', 'login'];
            try {
                $con = FACTORY->get_connexion();

                foreach ($newData as $key => $value) {
                    if (in_array($key, $tableUser)) {
                        $con->exec("update users set $key = '$value' where login='$this->login'");
                    }
                    if (in_array($key, $tableStudent)) {
                        $con->exec("update etudiants set $key = '$value' where login='$this->login'");
                    }
                }

            } catch (PDOException $e) {
                throw new DataBaseException('Une erreur est survenue:' . $e->getMessage());
            }

        }

        /**
         * Fonction de suppression de l'étudiant actuelle
         */
        public function delete(): void
        {
            $con = FACTORY->get_connexion();

            $deleteUser = "delete from users where login='$this->login'";
            $deleteStudent = "delete from etudiants where login ='$this->login'";

            $con->exec($deleteUser);
            $con->exec($deleteStudent);
        }


    }

