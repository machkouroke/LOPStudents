<?php


    namespace model\beans;

    use PDO;
    use PDOException;
    require_once ('user.php');


    class Etudiant extends user
    {
        public string $birthDate, $cv, $photo,$email,$cne;
        public string $faculty,$facultyYear;


        public function __construct($factory, ...$data)
        {
            $userTab = array('login'=>$data['login'],'name'=>$data['name'],'surname'=>$data['surname'],'password'=>$data['password'],'city'=>$data['city'],'zipCode'=>$data['zipCode'],'country'=>$data['country'],'role'=>'student');

            parent::__construct($factory, ...$userTab);

            $this->birthDate = $data['birthDate'];
            $this->cv = $data['cv'];
            $this->photo = $data['photo'];
            $this->faculty = $data['faculty'];
            $this->facultyYear = $data['facultyYear'];
            $this->cne = $data['cne'];
            $this->email = $data['email'];
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
        public static function getById($id, Factory $factory)
        {
            $con = $factory->get_connexion();
            $sql = "SELECT * FROM etudiants NATURAL JOIN users WHERE id='" . $id . "'";
            $res = $con->query($sql);
            return $res->fetch();
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
        public static function getByPays($pays, Factory $factory)
        {
            $con = $factory->get_connexion();
            $sql = "SELECT * FROM etudiants natural join users WHERE pays='" . $pays . "'";
            $res = $con->query($sql);
            return $res->fetchAll();
        }

        //fonction d'ajout d'un etudiant
        public function add()
        {
            try {

                $con = $this->factory->get_connexion();
                $userInfo = $this->getUserTable();

                $studentInfo = $this->getStudentTable();

                $addUser = 'insert into users values (?,?,?,?,?,?,?,?)';
                $addStudent = "INSERT INTO etudiants  VALUES 
                            (?,?,?,?,?,?,?,?)";

                $statementUser = $con->prepare($addUser);
                $statementUser->execute($userInfo);
                $statementStudent = $con->prepare($addStudent);
                $statementStudent->execute($studentInfo);
                echo 'Ajouté';
            } catch (PDOException $e) {
                echo 'erreur' . $e->getMessage();
            }

        }

        public function update()
        {
            try{
                $con = $this->factory->get_connexion();
                $userTable = $this->getUserTable();
                array_shift($userTable);
                $userInfo = $userTable;
                $studentTable = $this->getStudentTable();
                array_shift($studentTable);
                $studentInfo = $studentTable;

                $updateStudent = "update etudiants set cv=?, photo=?, email=?, birthDate=?
                    ,faculty=?, facultyYear=?, login=? where cne='".$this->cne."'";

                $updateUser ="update users set name=?, surname=?, password=?, city=?,
                    zipCode=?, country=?, role=? where login in (select login from etudiants where cne='".$this->cne."')";

                $statementStudent = $con->prepare($updateStudent);
                $statementStudent->execute($studentInfo);
                $statementUser = $con->prepare($updateUser);
                $statementUser->execute($userInfo);
                echo "Mofifiee";
            }catch (PDOException $e){
                echo $e->getMessage();
            }

        }

        public function delete()
        {
            $con = $this->factory->get_connexion();
            $deleteUser = "delete from users where login in (select login from etudiants where cne='".$this->cne."')";
            $deleteStudent = "delete from etudiants where cne ='".$this->cne."'";
            $con->exec($deleteUser);
            $con->exec($deleteStudent);

        }

        public function getFriends(){
            $con = $this->factory->get_connexion();
            $sql = "select name,surname,email from users NATURAL join etudiants 
                    where faculty='".$this->faculty."' and facultyYear='".$this->facultyYear."' and cne<>'".$this->cne."'";
            $res = $con->query($sql);
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUserTable(){
            return [$this->login, $this->name,
                $this->surname, $this->password, $this->city,
                $this->zipCode, $this->country, $this->getRole()];
        }

        public function getStudentTable(){
            return [$this->cne,$this->cv, $this->photo, $this->email,$this->birthDate,
                $this->faculty, $this->facultyYear, $this->login];
        }
    }

