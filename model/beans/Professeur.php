<?php

    namespace model\beans;
    use Exception\DataBaseException;
    use PDO;
    use PDOException;

    require_once ('Factory.php');


    class Professeur extends user
    {
        public string $matricule,  $email;

        public function __construct($factory, ...$data)
        {
            $userTab =  array('login'=>$data['login'],'name'=>$data['name'],'surname'=>$data['surname'],'password'=>$data['password'],'city'=>$data['city'],'zipCode'=>$data['zipCode'],'country'=>$data['country'],'role'=>'teacher');
            parent::__construct($factory, ...$userTab);
            $this->matricule = $data['matricule'];
            $this->email = $data['email'];
        }

        public static function getAll(Factory $factory):bool|array
        {
            $con = $factory->get_connexion();
            $sql = "select * from professeur natural join users";
            $res = $con->query($sql);
            return $res->fetchAll();
        }

        public static function getByMatricule(string $matricule,Factory $factory){
            $con = $factory->get_connexion();
            $sql = "SELECT * FROM professeur NATURAL JOIN users WHERE matricule='" . $matricule . "'";
            $res = $con->query($sql);
            return $res->fetch(PDO::FETCH_ASSOC);
        }

        public function add(){
            try{
                $con = $this->factory->get_connexion();
                $userInfo = $this->getUserTable();

                $studentInfo = $this->getProfTable();

                $addUser = 'insert into users values (?,?,?,?,?,?,?,?)';
                $addStudent = "INSERT INTO professeur VALUES 
                            (?,?,?)";

                $statementUser = $con->prepare($addUser);
                $statementUser->execute($userInfo);
                $statementStudent = $con->prepare($addStudent);
                $statementStudent->execute($studentInfo);
                echo 'Ajouté';
            }catch (\PDOException $e) {
                if($e->getCode() == 23000){
                    throw new DataBaseException("Le nom d'utilisateur existe déja");
                }
            }
        }

        public function update()
        {
            try{
                $con = $this->factory->get_connexion();
                $userTable = $this->getUserTable();
                array_shift($userTable);
                $userInfo = $userTable;
                $profTable = $this->getProfTable();
                array_shift($profTable);
                $profInfo = $profTable;

                $updateProf = "update professeur set email=?, login=? where matricule='".$this->matricule."'";

                $updateUser ="update users set name=?, surname=?, password=?, city=?,
                    zipCode=?, country=?, role=? where login in (select login from professeur where matricule='".$this->matricule."')";

                $statementStudent = $con->prepare($updateUser);
                $statementStudent->execute($userInfo);
                $statementUser = $con->prepare($updateProf);
                $statementUser->execute($profInfo);
                echo "Mofifiee";
            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }

        public function delete()
        {
            $con = $this->factory->get_connexion();
            $deleteUser = "delete from users where login in (select login from professeur where matricule='".$this->matricule."')";
            $deleteProf = "delete from professeur where matricule ='".$this->matricule."'";
            $con->exec($deleteUser);
            $con->exec($deleteProf);
        }

        public function getStudents(){
            $con = $this->factory->get_connexion();
            $sql = "select cne,name,surname,email,cv,photo,faculty,facultyYear from etudiants natural join users where (faculty,facultyYear) in (select
                        faculty,facultyYear from module where matricule='".$this->matricule."')";
            $res = $con->query($sql);
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUserTable(): array
        {
            return [$this->login, $this->name,
                $this->surname, $this->password, $this->city,
                $this->zipCode, $this->country, $this->getRole()];
        }

        public function getProfTable(): array
        {
            return [$this->matricule,$this->email,$this->login];
        }
    }