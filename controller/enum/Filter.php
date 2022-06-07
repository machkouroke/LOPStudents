<?php
    namespace controller\enum;
    /**
     * @author Machkour OKE
     * Enumeration permettant de filtrer les etudiants selon les cas
     */
    enum Filter
    {
        case CITY;
        case YEAR;
        case FACULTY;
        case NONE;
    }