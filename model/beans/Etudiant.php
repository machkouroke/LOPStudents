<?php

    namespace model\beans;
    use model\beans\Factory;
    use PDOException;

    class Etudiant extends user
    {
        public string $date_nais, $pays, $tel, $cv, $photo, $filiere;
        public int $niveau;


        public function __construct($nom, $prenom, $date_nais, $pays, $tel, $cv, $photo, $filiere, $niveau, $login, $pwd, $factory)
        {
            parent::__construct($login, $nom, $prenom, $pwd, 'étudiant', $factory);
            $this->pays = $pays;
            $this->date_nais = $date_nais;
            $this->tel = $tel;
            $this->cv = $cv;
            $this->photo = $photo;
            $this->filiere = $filiere;
            $this->niveau = $niveau;
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
                $userInfo = [$this->login, $this->nom,
                    $this->prenom, $this->pwd, $this->fonction];
                $studentInfo = [$this->cv, $this->photo, $this->date_nais, $this->tel,
                    $this->pays, $this->filiere, $this->niveau, $this->login];

                $addUser = 'insert into users values (?,?,?,?,?)';
                $addStudent = "INSERT INTO etudiants (cv,photo,date_nais,
                       telephone,pays,filiere,niveau,login) VALUES 
                            (?,?,?,?,?,?,?, ?)";
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
            // TODO: Implement update() method.
        }

        public function delete()
        {
            // TODO: Implement delete() method.
        }
    }



