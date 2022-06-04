<?php


    namespace model\beans;

    use Exception\DataBaseException;
    use Exception\UserException;
    use PDO;
    use PDOException;


    /**
     * @author Morel Kouhossounon
     * Classe Représentant un étudiant
     */
    class Student extends User
    {
        public string $birthDate, $cv, $photo, $email, $cne;
        public string $faculty, $facultyYear;


        public function __construct(string ...$data)
        {
            $userTab = array('login' => $data['login'], 'name' => $data['name'], 'surname' => $data['surname'],
                'password' => $data['password'], 'city' => $data['city'], 'zipCode' => $data['zipCode'],
                'country' => $data['country'], 'role' => 'student');

            parent::__construct(...$userTab);

            $this->birthDate = $data['birthDate'];
            $this->cv = $data['cv'];
            $this->photo = $data['photo'];
            $this->faculty = $data['faculty'];
            $this->facultyYear = $data['facultyYear'];
            $this->email = $data['email'];
            $this->generateCne();
        }

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
        public function getPhoto(): string
        {
            return $this->photo;
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
         * Génère le CNE suivant le dernier element de la base
         */
        public function generateCne(): void
        {
            $con = FACTORY->get_connexion();
            $res = $con->query('select max(id)+1 from etudiants')->fetch(PDO::FETCH_ASSOC);
            $id = $res['max(id)+1'] != null ? (string)$res['max(id)+1'] : '1';
            $this->cne = 'ENSA22000' . $id;
        }

        /**
         * Renvoie la liste de tous les étudiants en jointure avec leur utilisateur correspondant
         * @return bool|array Liste de tous les étudiants
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

        public static function changeToStudent($res): array
        {
            $all = [];
            foreach ($res->fetchAll(PDO::FETCH_ASSOC) as $item) {
                $student = new Student(...$item);
                $student->setCne($item['cne']);
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
                $addUser = 'insert into users values (?,?,?,?,?,?,?,?)';
                $addStudent = "INSERT INTO etudiants  VALUES 
                            (NULL,?,?,?,?,?,?,?,?)";
                $statementUser = $con->prepare($addUser);
                $statementUser->execute($userInfo);
                $statementStudent = $con->prepare($addStudent);
                $statementStudent->execute($studentInfo);
                echo 'Ajouté';
            } catch (PDOException $e) {

                if ($e->getCode() == 23000) {
                    throw new UserException("Le nom d'utilisateur existe déja");
                }

                throw new DataBaseException('Erreur: ' . $e->getMessage());

            }

        }

        /**
         * Fonction de mise à jour de l'étudiant en cours
         * @throws DataBaseException
         */
        public function update(string ...$newData): void
        {
            try {
                $con = FACTORY->get_connexion();


                $updateStudent = "update etudiants set cv=?, photo=?, email=?, birthDate=?

                    ,faculty=?, facultyYear=? where login=?";

                $updateUser = "update users set name=?, surname=?, password=?, city=?,
                    zipCode=?, country=?, role='student' where login='$this->login'";


                $statementStudent = $con->prepare($updateStudent);
                $faculties = explode(' ', $newData['faculty']);

                $studentInfo = [$newData['cv'], $newData['photo'], $newData['email'], $newData['birthDate'],
                    $faculties[0], $faculties[1], $this->login];
                $statementStudent->execute($studentInfo);
                $statementUser = $con->prepare($updateUser);
                $userInfo = [$newData['name'], $newData['surname'], $newData['password'], $newData['city'],
                    $newData['zipCode'], $newData['country']];
                $statementUser->execute($userInfo);
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
            return [$this->cne, $this->cv, $this->photo, $this->email, $this->birthDate,
                $this->faculty, $this->facultyYear, $this->login];
        }
    }

