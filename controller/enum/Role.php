<?php
    namespace controller\enum;
    /**
     * @author Machkour OKE
     * Enumeration sur la fonction des utilisateurs
     */
    enum Role: String
    {
        case Admin = 'admin';
        case Teacher = 'teacher';
        case Student = 'student';
    }