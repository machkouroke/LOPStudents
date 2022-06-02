<?php

    namespace model\beans;

    use PDO;

    require_once('Factory.php');


    /**
     * @author Morel Kouhossounon
     * Représente une filière donnée
     */
    class Faculty
    {
        public int $facultyYear;
        public string $faculty;


        /**
         * @param String $faculty Filière donnée
         * @param int $facultyYear Année de la filière
         */
        public function __construct(string $faculty, int $facultyYear)
        {

            $this->faculty = $faculty;
            $this->facultyYear = $facultyYear;
        }


        /**
         * Retourne la filière
         * @return string La filière
         */
        public function getFaculty(): string
        {
            return $this->faculty;
        }

        /**
         * Retourne l'année de la filière
         * @return int L'année de la filière
         */
        public function getFacultyYear(): int
        {
            return $this->facultyYear;
        }
        /**
         * Retourne la liste de toutes les filières
         * @return array La liste de toutes les filières
         */
        public static function getAll(): array
        {
            $allClass = [];
            $con = FACTORY->get_connexion();
            $sql = 'select * from classe';
            $res = $con->query($sql);
            foreach ($res->fetchAll(PDO::FETCH_NUM) as $class) {

                $newline = implode('', $class);
                $allClass[] = $newline;
            }
            return $allClass;
        }

    }