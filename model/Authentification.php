<?php
    require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'model\beans\Factory.php');
    require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'Exception\UserException.php');
    require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'Exception\DataBaseException.php');

    /**
     * @throws UserException Jeté quand les informations sont incorrects
     * @throws DataBaseException Erreur lors de la lecture des données à la base de données
     */
    function authenticate(string $login, string $password): user
    {
        $con = (new Factory('root', 'momo'))->get_connexion();
        try {
            $result = $con->query("SELECT * FROM users where login='" . $login . "'");
            $user = $result->fetch(PDO::FETCH_ASSOC);
            if (!empty($user)) {
                if ($user['password'] == $password) {
                    return new user($user['login'],
                        $user['nom'],
                        $user['prenom'], $user['pwd'], $user['fonction']);
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


