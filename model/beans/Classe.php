<?php
    namespace model\beans;
    use PDO;

    require_once ('Factory.php');


    class Classe
    {
        public $faculty, $facultyYear;
        public Factory $factory;

        /**
         * @param $filiere
         * @param $niveau
         */
        public function __construct($faculty, $facultyYear,$factory)
        {
            $this->factory = $factory;
            $this->faculty = $faculty;
            $this->facultyYear = $facultyYear;
        }


        /**
         * @return mixed
         */
        public function getFaculty()
        {
            return $this->faculty;
        }

        /**
         * @return mixed
         */
        public function getFacultyYear()
        {
            return $this->facultyYear;
        }

        public static function getAll(): array
        {
            $allClass = [];
            $con = FACTORY->get_connexion();
            $sql = 'select * from classe';
            $res = $con->query($sql);
            foreach($res->fetchAll(PDO::FETCH_NUM) as $class){

                $newligne = implode('',$class);
                $allClass[]= $newligne;
            }
            return $allClass;
        }

    }