<?php

    namespace model\beans;

    use PDOException;



    class User
    {
        public string $login, $name, $surname, $password, $role, $city, $country;
        public int $zipCode;

        public function __construct(string ...$data)
        {
            $this->login = $data['login'];
            $this->name = $data['name'];
            $this->surname = $data['surname'];
            $this->password = $data['password'];
            $this->city = $data['city'];
            $this->zipCode = (int)$data['zipCode'];
            $this->country = $data['country'];
            $this->role = $data['role'];

        }


        public static function getAll(): bool|array
        {
            $conn = FACTORY->get_connexion();
            $sql = "SELECT * FROM users";
            $res = $conn->prepare($sql);
            $res->execute();
            return $res->fetchAll();
        }

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
         * @return String
         */
        public function getLogin(): string
        {
            return $this->login;
        }

        /**
         * @return String
         */
        public function getPassword(): string
        {
            return $this->password;
        }

        /**
         * @return String
         */
        public function getCity(): string
        {
            return $this->city;
        }

        /**
         * @return String
         */
        public function getCountry(): string
        {
            return $this->country;
        }

        /**
         * @return int
         */
        public function getZipCode(): int
        {
            return $this->zipCode;
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @return string
         */
        public function getSurname(): string
        {
            return $this->surname;
        }

        /**
         * @return string
         */
        public function getRole(): string
        {
            return $this->role;
        }

    }