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


        public static function getByLogin(string $login): User|bool
        {
            $con = FACTORY->get_connexion();
            $sql = "select * from users where login='" . $login . "'";
            if ($res = ($con->query($sql))->fetch(PDO::FETCH_ASSOC)) {
                return new User(...$res);
            }
            return false;

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
         * @throws DataBaseException
         */
        public function changePassword(string $newPassword, string $newLogin): void
        {
            try {
                $con = FACTORY->get_connexion();
                $sql = 'update users set 
                 password=?, login=?  where login=?';
                $statement = $con->prepare($sql);
                $statement->execute([$newPassword, $newLogin, $this->login]);
                $this->login = $newLogin;
                $this->password = $newPassword;
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    throw new DataBaseException("Ce nom d'utilisateur existe déja dans la base de données");
                }
                throw new DataBaseException("Une erreur est survenue de notre part");
            }
        }

    }