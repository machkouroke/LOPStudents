<?php

    namespace model\LOPStudents;


    use controller\enum\Role;
    use Exception\DataBaseException;
    use model\LOPStudents\Trait\UserSettersAndGetters;
    use PDO;
    use PDOException;


    /**
     * @author Morel Kouhossounon
     * Modèle utilisateur de base
     */
    class User
    {
        protected string $login, $name, $surname, $password, $city, $country, $photo;
        protected int $zipCode;
        protected Role $role;
        use UserSettersAndGetters;

        public function __construct(...$data)
        {
            $this->login = $data['login'];
            $this->name = $data['name'];
            $this->surname = $data['surname'];
            $this->password = $data['password'];
            $this->city = $data['city'];
            $this->zipCode = (int)$data['zipCode'];
            $this->country = $data['country'];
            $this->photo = $data['photo'];
            $this->role = Role::FROM($data['role']);

        }

        /**
         * @throws DataBaseException
         */
        public static function getByLogin(string $login): User
        {
            $con = FACTORY->get_connexion();
            $sql = "select * from users where login='" . $login . "'";
            $res = ($con->query($sql))->fetch(PDO::FETCH_ASSOC);
            if($res){
                return new User(...$res);
            }else{
                throw new DataBaseException('Utilisateur inexistant');
            }
        }

        public function delete(): void
        {
            $con = FACTORY->get_connexion();
            $deleteUser = "delete from users where login='$this->login'";
            $con->exec($deleteUser);

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

    }