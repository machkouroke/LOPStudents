<?php
    namespace model\beans;
    require_once('Factory.php');

    class user
    {
        public string $login, $nom, $prenom, $pwd, $fonction;
        protected Factory $factory;

        public function __construct($login, $nom, $prenom, $pwd = '', $fonction = '', $factory = null)
        {
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->pwd = $pwd;
            $this->fonction = $fonction;
            $this->factory = $factory;
        }

        public static function getAll(Factory $factory): bool|array
        {
            $conn = $factory->get_connexion();
            $sql = "SELECT * FROM users";
            $res = $conn->prepare($sql);
            $res->execute();
            return $res->fetchAll();
        }

        /**
         * @return string
         */
        public function getNom(): string
        {
            return $this->nom;
        }

        /**
         * @return string
         */
        public function getPrenom(): string
        {
            return $this->prenom;
        }

        /**
         * @return mixed|string
         */
        public function getFonction(): mixed
        {
            return $this->fonction;
        }

    }
