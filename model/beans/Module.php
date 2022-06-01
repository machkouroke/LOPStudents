<?php
    namespace model\beans;
    use PDOException;

    require_once ('Factory.php');

    class Module
    {
        public string $faculty, $facultyYear, $matricule, $name;
        public Factory $factory;

        public function __construct($factory, ...$data)
        {
            $this->factory = $factory;
            $this->faculty = $data['faculty'];
            $this->facultyYear = $data['facultyYear'];
            $this->matricule = $data['matricule'];
            $this->name = $data['name'];
        }

        public function add(): void
        {
            try{
                $con = $this->factory->get_connexion();
                $sql = "insert into module values ('$this->faculty','$this->facultyYear','$this->matricule','$this->name')";
                $statement = $con->exec($sql);
//                $statement->execute([$this->faculty,$this->facultyYear,$this->matricule,$this->name]);
            }catch (PDOException $e) {echo $e->getMessage();}
        }

        public function update(): void
        {
            try{
                $con = $this->factory->get_connexion();
                $sql = 'update module set name=? where faculty=? and facultyYear=? and matricule=?';
                $statement = $con->prepare($sql);
                $statement->execute([$this->name,$this->faculty,$this->facultyYear,$this->matricule]);
            }catch (\PDOException $e) {echo $e->getMessage();}
        }

        public function delete(): void
        {
            $con = $this->factory->get_connexion();
            $sql = 'delete from module where faculty=? and facultyYear=? and matricule=?';
            $statement = $con->prepare($sql);
            $statement->execute([$this->faculty,$this->facultyYear,$this->matricule]);
        }
    }