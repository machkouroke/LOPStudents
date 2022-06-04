<?php

    namespace model\LOPStudents\Trait;

    use controller\Role;
    use JetBrains\PhpStorm\Pure;

    trait UserSettersAndGetters
    {

        /**
         * Renvoie le Login de l'utilisateur
         * @return String Login de l'utilisateur
         */
        public function getLogin(): string
        {
            return $this->login;
        }

        /**
         * Renvoie le mot de passe de l'utilisateur
         * @return String Mot de passe de l'utilisateur
         */
        public function getPassword(): string
        {
            return $this->password;
        }

        /**
         * Renvoie la ville de l'utilisateur
         * @return String Ville de l'utilisateur
         */
        public function getCity(): string
        {
            return $this->city;
        }

        /**
         * Renvoie le pays de l'utilisateur
         * @return String Pays de l'utilisateur
         */
        public function getCountry(): string
        {
            return $this->country;
        }

        /**
         * Renvoie le code Postale de l'utilisateur
         * @return int Code Postale de l'utilisateur
         */
        public function getZipCode(): int
        {
            return $this->zipCode;
        }

        /**
         * Renvoie le nom de l'utilisateur
         * @return String Nom de l'utilisateur
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * Renvoie le prénom de l'utilisateur
         * @return String Prénom de l'utilisateur
         */
        public function getSurname(): string
        {
            return $this->surname;
        }

        /**
         * Renvoie le rôle de l'utilisateur
         * @return Role Role de l'utilisateur
         */
        public function getRole(): Role
        {
            return $this->role;
        }

        /**
         * Renvoie toutes les informations de l'étudiant actuel (En tant qu'Utilisateur)
         * @return array Informations de l'étudiant actuel
         */
        #[Pure] public function getUserTable(): array
        {
            return [$this->login, $this->name,
                $this->surname, $this->password, $this->city,
                $this->zipCode, $this->country, $this->getRole()->value];
        }

        /**
         * Renvoie la liste de tous les utilisateurs
         * @return bool|array Liste de tous les utilisateurs
         */
        public static function getAll(int $first, int $last): bool|array
        {
            $conn = FACTORY->get_connexion();
            $sql = 'SELECT * FROM users';
            $res = $conn->prepare($sql);
            $res->execute();
            return $res->fetchAll();
        }
    }