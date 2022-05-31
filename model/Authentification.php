<?php
    require ('beans/Factory.php');
    require ('../Exception/UserException.php');

    function authenticate(string $login, string $password) {
        $con = (new Factory('root','momo'))->get_connexion();
        try{
            $result = $con->query("SELECT * FROM users where login='".$login."'");
            $user = $result->fetch(PDO::FETCH_ASSOC);
            if(!empty($user)){
                if($user['password'] == $password) {
                    echo 'Bienvenue';
                    return true;
                }
                else{
                    throw new UserException("Mot de passe incorrect");
                }
            }else{
                echo throw new UserException("Utilisateur introuvable");
            }
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
?>

