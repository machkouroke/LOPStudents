<?php
    namespace model\LOPStudents;
    use PDOException;

    require_once ('Factory.php');

    /**
     * @author Morel Kouhossounon
     * Représente un module qui est en fait l'association entre un proffesseur et une filière
     */
    class Module
    {
        public string $faculty, $facultyYear, $matricule, $name;


        public function __construct(...$data)
        {

            $this->faculty = $data['faculty'];
            $this->facultyYear = $data['facultyYear'];
            $this->matricule = $data['matricule'];
            $this->name = $data['name'];
        }

        /**
         * Ajoute le module actuel
         */
        public function add(): void
        {
            try{
                $con = FACTORY->get_connexion();
                $sql = "insert into module values ('$this->faculty','$this->facultyYear','$this->matricule','$this->name')";
                $statement = $con->exec($sql);
            }catch (PDOException $e) {echo $e->getMessage();}
        }

        /**
         * Mets à jour le module actuel
         */
        public function update(): void
        {
            try{
                $con = FACTORY->get_connexion();
                $sql = 'update module set name=? where faculty=? and facultyYear=? and matricule=?';
                $statement = $con->prepare($sql);
                $statement->execute([$this->name,$this->faculty,$this->facultyYear,$this->matricule]);
            }catch (\PDOException $e) {echo $e->getMessage();}
        }

        /**
         * Supprime le module actuel
         */
        public function delete(): void
        {
            $con = FACTORY->get_connexion();
            $sql = 'delete from module where faculty=? and facultyYear=? and matricule=?';
            $statement = $con->prepare($sql);
            $statement->execute([$this->faculty,$this->facultyYear,$this->matricule]);
        }
    }