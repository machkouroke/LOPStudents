<?php

    namespace model\beans;

    use PDO;
    use PDOException;

    /**
     * @author Morel Kouhossounon
     * Classe responsable de la connexion à la base de données. Elle assure qu'une seule connexion à la base soit
     *     active en même temps
     */
    class Factory
    {

        public string $password;
        public string $username;
        public string $dns;
        public $connexion;

        public function __construct(string $username, string $password)
        {
            $this->dns = 'mysql:host=localhost;dbname=lopstudents';
            $this->username = $username;
            $this->password = $password;
            try {
                $this->connexion = new PDO($this->dns, $this->username, $this->password);
                $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erreur de connexion ' . $e->getMessage());
            }
        }

        /**
         * Renvoie l'objet de la connexion
         * @return PDO L'objet de la connexion
         */
        public function get_connexion(): PDO
        {
            return $this->connexion;
        }

        public function __destruct()
        {
            $this->connexion = null;
        }
    }