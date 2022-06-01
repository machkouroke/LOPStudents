<?php
    namespace model\beans;


    class Classe
    {
        public $faculty, $facultyYear;

        /**
         * @param $filiere
         * @param $niveau
         */
        public function __construct($faculty, $facultyYear)
        {
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


    }