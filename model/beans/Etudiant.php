<?php


    namespace model\beans;

    use Exception\DataBaseException;
    use PDO;
    use PDOException;

    require_once('user.php');
    require_once('..\..\Exception\DataBaseException.php');

    class Etudiant extends user
    {
        public string $birthDate, $cv, $photo, $email, $cne;
        public string $faculty, $facultyYear;


        public function __construct($factory, ...$data)
        {
            print('<pre>');
            print_r($data);
            print('</pre>');
            $userTab = array('login' => $data['login'], 'name' => $data['name'], 'surname' => $data['surname'],
                'password' => $data['password'], 'city' => $data['city'], 'zipCode' => $data['zipCode'],
                'country' => $data['country'], 'role' => 'student');

            parent::__construct($factory, ...$userTab);

            $this->birthDate = $data['birthDate'];
            $this->cv = $data['cv'];
            $this->photo = $data['photo'];
            $this->faculty = $data['faculty'];
            $this->facultyYear = $data['facultyYear'];
            $this->email = $data['email'];
            $this->setCne();
        }

        public function setCne(){
            $con = $this->factory->get_connexion();
            $res = $con->query('select max(id)+1 from etudiants')->fetch(PDO::FETCH_ASSOC);
            $id = $res['max(id)+1']!=null? (string)$res['max(id)+1']:'1';
            $this->cne = 'ENSA22000'.$id;
        }

        //methode pour recuperer tous les etudiants de la base de donnees
        public static function getAll(Factory $factory): bool|array
        {
            $con = $factory->get_connexion();
            $sql = 'SELECT * FROM etudiants NATURAL JOIN users';
            $res = $con->query($sql);
            return $res->fetchAll();
        }

        //reherche de l'etudiant selon l'id
        public static function getByCne($cne, Factory $factory)
        {
            $con = $factory->get_connexion();
            $sql = "SELECT * FROM etudiants NATURAL JOIN users WHERE cne='" . $cne . "'";
            $res = $con->query($sql);
            return $res->fetch(PDO::FETCH_ASSOC);
        }

        //recherche selon l'age
        public static function getByAge($age, Factory $factory)
        {
            $con = $factory->get_connexion();
            $sql = "SELECT * FROM etudiants NATURAL JOIN users WHERE TIMESTAMPDIFF(year, date_nais , NOW())='" . $age . "'";
            $res = $con->query($sql);
            return $res->fetchAll();
        }

        //recherche des etudiants selon la classe
        public static function getByClasse(string $fil, int $niv, Factory $factory)
        {
            $con = $factory->get_connexion();
            $sql = "SELECT * FROM etudiants natural join users WHERE filiere='" . $fil . "' AND niveau='" . $niv . "'";
            $res = $con->query($sql);
            return $res->fetchAll();
        }

        //recherche selon la ville
        public static function getByCountry($country, Factory $factory)
        {
            $con = $factory->get_connexion();
            $sql = "SELECT * FROM etudiants natural join users WHERE pays='" . $country . "'";
            $res = $con->query($sql);
            return $res->fetchAll();
        }

        //fonction d'ajout d'un etudiant

        /**

         * @throws DataBaseException Erreur de connexion à la base de données

         */
        public function add()
        {
            try {

                $con = $this->factory->get_connexion();
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

                if($e->getCode() == 23000){
                    throw new DataBaseException("Le nom d'utilisateur existe déja");
                }

                throw new DataBaseException('erreur' . $e->getMessage());

            }

        }

        public function update()
        {
            try {
                $con = $this->factory->get_connexion();
                $userTable = $this->getUserTable();
                array_shift($userTable);
                $userInfo = $userTable;
                $studentTable = $this->getStudentTable();
                array_shift($studentTable);
                $studentInfo = $studentTable;

                $updateStudent = "update etudiants set cv=?, photo=?, email=?, birthDate=?

                    ,faculty=?, facultyYear=? where login=?";

                $updateUser ="update users set name=?, surname=?, password=?, city=?,
                    zipCode=?, country=?, role=? where login='$this->login'";


                $statementStudent = $con->prepare($updateStudent);
                $statementStudent->execute($studentInfo);
                $statementUser = $con->prepare($updateUser);
                $statementUser->execute($userInfo);
                echo "Mofifiee";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

        }

        public function delete()
        {
            $con = $this->factory->get_connexion();

            $deleteUser = "delete from users where login='$this->login'";
            $deleteStudent = "delete from etudiants where login ='$this->login'";

            $con->exec($deleteUser);
            $con->exec($deleteStudent);

        }

        public function getFriends(): bool|array
        {
            $con = $this->factory->get_connexion();
            $sql = "select name,surname,email from users NATURAL join etudiants 
                    where faculty='" . $this->faculty . "' and facultyYear='" . $this->facultyYear . "' and cne<>'" . $this->cne . "'";
            $res = $con->query($sql);
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProfs(): bool|array
        {
            $con = $this->factory->get_connexion();
            $sql = "select * from professeur natural join users where matricule in (select matricule from module 
                                where faculty='$this->faculty' and facultyYear='$this->facultyYear')";
            $res = $con->query($sql);
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUserTable(): array
        {
            return [$this->login, $this->name,
                $this->surname, $this->password, $this->city,
                $this->zipCode, $this->country, $this->getRole()];
        }

        public function getStudentTable(): array
        {
            return [$this->cne, $this->cv, $this->photo, $this->email, $this->birthDate,
                $this->faculty, $this->facultyYear, $this->login];
        }
    }

