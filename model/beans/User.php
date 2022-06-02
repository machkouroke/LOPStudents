<?php

    namespace model\beans;

    use JetBrains\PhpStorm\Pure;
    use PDOException;
    use Role;


    class User
    {
        public string $login, $name, $surname, $password,  $city, $country;
        public int $zipCode;
        public Role $role;

        public function __construct(string ...$data)
        {
            $this->login = $data['login'];
            $this->name = $data['name'];
            $this->surname = $data['surname'];
            $this->password = $data['password'];
            $this->city = $data['city'];
            $this->zipCode = (int)$data['zipCode'];
            $this->country = $data['country'];
            $this->role = Role::from($data['role']);

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
         * Renvoie la liste de tous les utilisateurs
         * @return bool|array Liste de tous les utilisateurs
         */
        public static function getAll(): bool|array
        {
            $conn = FACTORY->get_connexion();
            $sql = "SELECT * FROM users";
            $res = $conn->prepare($sql);
            $res->execute();
            return $res->fetchAll();
        }

        /**
         * Change le mot de passe de l'utilisateur actuelle
         * @param string $newPassword Nouveau mot de passe
         */
        public function changePassword(string $newPassword): void
        {
            try {
                $con = FACTORY->get_connexion();
                $sql = 'update users set password=? where login=?';
                $statement = $con->prepare($sql);
                $statement->execute([$newPassword, $this->login]);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

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

    }