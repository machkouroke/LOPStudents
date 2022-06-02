<?php

    namespace model;


    use Exception\UserException;
    use Exception\DataBaseException;
    use model\beans\User;
    use PDO;
    use PDOException;


    /**
     * @author Morel Kouhossounon
     * Gère le système d'authentification
     */
    class Authentification
    {
        /**
         * Authentifie un utilisateur
         * @param string $login Login saisi par l'utilisateur
         * @param string $password Password saisi par l'utilisateur'
         * @throws UserException Jeté quand les informations sont incorrects
         * @throws DataBaseException Erreur lors de la lecture des données à la base de données
         */
        public static function authenticate(string $login, string $password): User
        {

            $con = FACTORY->get_connexion();
            try {
                $result = $con->query("SELECT * FROM users where login='" . $login . "'");
                $user = $result->fetch(PDO::FETCH_ASSOC);

                if (!empty($user)) {
                    if ($user['password'] == $password) {
                        return new User(...$user);
                    } else {

                        throw new UserException("Mot de passe incorrect");
                    }
                } else {
                    throw new UserException("Utilisateur introuvable");
                }
            } catch (PDOException $e) {
                throw new DataBaseException("Erreur: ". $e->getMessage());
            }
        }
    }



