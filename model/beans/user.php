<?php

    namespace model\beans;
    use PDOException;

    require_once('Factory.php');


    class user
    {
        public string $login, $name, $surname, $password, $role, $city, $country;
        public int $zipCode;
        protected Factory $factory;

        public function __construct(Factory $factory, string ...$data)
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

        public function changePassword(string $newPassword): void
        {
            try{
                $con = $this->factory->get_connexion();
                $sql = 'update users set password=? where login=?';
                $statement = $con->prepare($sql);
                $statement->execute([$newPassword,$this->login]);
            }catch (PDOException $e){echo $e->getMessage();}
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
         * @return mixed|string
         */
        public function getRole(): mixed
        {
            return $this->role;
        }

    }