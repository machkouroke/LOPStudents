<?php

    namespace model\beans;
    require_once('Factory.php');


    class user
    {
        public string $login, $name, $surname, $password, $role, $city, $country;
        public int $zipCode;
        protected Factory $factory;

        public function __construct(Factory $factory, String ...$data)
        {
            $this->factory = $factory;
            $this->login = $data['login'];
            $this->name = $data['name'];
            $this->surname = $data['surname'];
            $this->password = $data['password'];
            $this->city = $data['city'];
            $this->zipCode = (int)$data['zipCode'];
            $this->country = $data['country'];
            $this->role = $data['role'];

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
