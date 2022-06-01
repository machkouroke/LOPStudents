<?php
    namespace model;
    use model\beans\Factory;
    use Exception\UserException;
    use Exception\DataBaseException;
    use model\beans\user;
    use PDOException;


class Authentification {
    /**
     * @throws UserException Jeté quand les informations sont incorrects
     * @throws DataBaseException Erreur lors de la lecture des données à la base de données
     */
    public static function authenticate(string $login, string $password, Factory $factory): user
    {

        $con = $factory->get_connexion();
        try {
            $result = $con->query("SELECT * FROM users where login='" . $login . "'");
            $user = $result->fetch(\PDO::FETCH_ASSOC);
            if (!empty($user)) {
                if ($user['password'] == $password) {
                    return new user($user['login'],
                        $user['nom'],
                        $user['prenom'], $user['password'], $user['fonction'], $factory);
                } else {

                    throw new UserException("Mot de passe incorrect");
                }
            } else {
                throw new UserException("Utilisateur introuvable");
            }
        } catch (PDOException $e) {
            throw new DataBaseException("Erreur de lecture des données");
        }
    }
}



