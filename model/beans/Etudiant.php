<?php
    require_once('Model.php');

    class Etudiant extends Model
    {
        public $nom, $prenom, $email, $pwd, $ville, $date_nais, $code_postal, $tel, $cv, $photo, $filiere, $niveau;

        public function __construct($nom, $prenom, $email, $pwd, $ville, $date_nais, $code_postal, $tel, $cv, $photo, $filiere, $niveau)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
            $this->pwd = $pwd;
            $this->ville = $ville;
            $this->date_nais = $date_nais;
            $this->code_postal = $code_postal;
            $this->tel = $tel;
            $this->cv = $cv;
            $this->photo = $photo;
            $this->filiere = $filiere;
            $this->niveau = $niveau;
        }

        //methode pour recuperer tous les etudiants de la base de donnees
        public static function getAll()
        {
            $sql = 'SELECT * FROM etudiants';
            $res = self::$connexion->query($sql);
            return $res->fetchAll();
        }

        //reherche de l'etudiant selon l'ID
        public static function getById($id)
        {
            $sql = "SELECT * FROM etudiants WHERE id='" . $id . "'";
            $res = self::$connexion->query($sql);
            return $res->fetch();
        }

        //calcul de l'age
        public static function getAge($birthDate): string
        {
            $today = date("Y-m-d");
            $age = date_diff(date_create($today), date_create($birthDate));
            return $age->format('%y');
        }

        //recherche selon l'age
        public static function getByAge($age)
        {
            $sql = "SELECT * FROM etudiants WHERE floor(dateDiff(current_date,date_nais)/365) ='" . $age . "'";
            $res = self::$connexion->query($sql);
            return $res->fetchAll();
        }

        //recherche des etudiants selon la classe
        public static function getByClasse($fil, $niv)
        {
            $sql = "SELECT * FROM etudiants WHERE filiere='" . $fil . "' AND niveau='" . $niv . "'";
            $res = self::$connexion->query($sql);
            return $res->fetchAll();
        }

        //recherche selon la ville
        public static function getByVille($ville)
        {
            $sql = "SELECT * FROM etudiants WHERE ville='" . $ville . "'";
            $res = self::$connexion->query($sql);
            return $res->fetchAll();
        }
    }

    Etudiant::getConnexion();
    $res = Etudiant::getByVille('Cotonou');
    var_dump($res);
    //$b = new Etudiant('a','s','d','f','g','h','j','k','l','q','w','e');
?>
