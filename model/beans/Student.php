<?php


    namespace model\beans;

    use Exception\DataBaseException;
    use Exception\UserException;
    use JetBrains\PhpStorm\Pure;
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


        public function __construct(...$data)
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
            $this->setCne();
        }

        /**
         * Génère le CNE suivant le dernier element de la base
         */
        public function setCne(): void
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
        public static function getAll(): bool|array
        {
            $con = FACTORY->get_connexion();
            $sql = 'SELECT * FROM etudiants NATURAL JOIN users';
            $res = $con->query($sql);
            return $res->fetchAll();
        }

        /**
         * Recherche un étudiant en fonction de son CNE
         * @param String $cne Cne de l'étudiant à rechercher
         * @return mixed Étudiant avec le CNE données
         */
        public static function getByCne(String $cne): mixed
        {
            $con = FACTORY->get_connexion();
            $sql = "SELECT * FROM etudiants NATURAL JOIN users WHERE cne='" . $cne . "'";
            $res = $con->query($sql);
            return $res->fetch(PDO::FETCH_ASSOC);
        }

        /**
         * Recherche les étudiants avec un âge donné
         * @param int $age Age voulu des étudiants
         * @return bool|array Liste des étudiants avec l'age donné
         */
        public static function getByAge(int $age): bool|array
        {
            $con = FACTORY->get_connexion();
            $sql = "SELECT * FROM etudiants NATURAL JOIN users WHERE TIMESTAMPDIFF(year, date_nais , NOW())='" . $age . "'";
            $res = $con->query($sql);
            return $res->fetchAll();
        }

        /**
         * Recherche les étudiants selon une classe donnée
         * @param string $fil Filière voulue
         * @param int $niv Année de la filière
         * @return bool|array
         */
        public static function getByClasse(string $fil, int $niv): bool|array
        {
            $con = FACTORY->get_connexion();
            $sql = "SELECT * FROM etudiants natural join users WHERE filiere='" . $fil . "' AND niveau='" . $niv . "'";
            $res = $con->query($sql);
            return $res->fetchAll();
        }

        /**
         * Recherche les étudiants selon une ville donnée
         * @param String $country Ville voulue
         * @return bool|array Tableau d'étudiant dans la ville donné
         */
        public static function getByCountry(String $country): bool|array
        {
            $con = FACTORY->get_connexion();
            $sql = "SELECT * FROM etudiants natural join users WHERE pays='" . $country . "'";
            $res = $con->query($sql);
            return $res->fetchAll();
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
         */
        public function update(): void
        {
            try {
                $con = FACTORY->get_connexion();
                $userTable = $this->getUserTable();
                array_shift($userTable);
                $userInfo = $userTable;
                $studentTable = $this->getStudentTable();
                array_shift($studentTable);
                $studentInfo = $studentTable;

                $updateStudent = "update etudiants set cv=?, photo=?, email=?, birthDate=?

                    ,faculty=?, facultyYear=? where login=?";

                $updateUser = "update users set name=?, surname=?, password=?, city=?,
                    zipCode=?, country=?, role=? where login='$this->login'";


                $statementStudent = $con->prepare($updateStudent);
                $statementStudent->execute($studentInfo);
                $statementUser = $con->prepare($updateUser);
                $statementUser->execute($userInfo);
            } catch (PDOException $e) {
                echo $e->getMessage();
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
            $sql = "select name,surname,email from users NATURAL join etudiants 
                    where faculty='" . $this->faculty . "' and facultyYear='" . $this->facultyYear . "' and cne<>'" . $this->cne . "'";
            $res = $con->query($sql);
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }

        /**
         * Renvoie-les proffesseur de l'étudiant actuel
         * @return bool|array Tableau des proffesseur de l'étudiant actuel
         */
        public function getProfs(): bool|array
        {
            $con = FACTORY->get_connexion();
            $sql = "select * from professeur natural join users where matricule in (select matricule from module 
                                where faculty='$this->faculty' and facultyYear='$this->facultyYear')";
            $res = $con->query($sql);
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }

        /**
         * Renvoie toutes les informations de l'étudiant actuel (En tant qu'Utilisateur)
         * @return array Informations de l'étudiant actuel
         */
        #[Pure] public function getUserTable(): array
        {
            return [$this->login, $this->name,
                $this->surname, $this->password, $this->city,
                $this->zipCode, $this->country, $this->getRole()];
        }

        /**
         * Renvoie toutes les informations de l'étudiant actuel (En tant qu'Etudiant)
         * @return array Informations de l'étudiant actuel
         */
        public function getStudentTable(): array
        {
            return [$this->cne, $this->cv, $this->photo, $this->email, $this->birthDate,
                $this->faculty, $this->facultyYear, $this->login];
        }
    }

