<?php

    namespace model;


    use controller\enum\Role;
    use Exception\UserException;
    use Exception\DataBaseException;
    use model\LOPStudents\Student;
    use model\LOPStudents\Teacher;
    use model\LOPStudents\User;



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


            try {

                $user = User::getByLogin($login);
                if (!empty($user)) {
                    if ($user->getPassword() == $password) {
                        return match ($user->getRole()) {
                            Role::Student => Student::getByLogin($login),
                            Role::Teacher => Teacher::getByLogin($login),
                            default => $user,
                        };
                    } else {

                        throw new UserException("Mot de passe incorrect");
                    }
                } else {
                    throw new UserException("Utilisateur introuvable");
                }
            } catch (\PDOException $e) {
                throw new DataBaseException("Erreur: " . $e->getMessage());
            }
        }
    }



