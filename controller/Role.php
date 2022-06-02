<?php
    namespace controller;
    enum Role: String
    {
        case Admin = 'admin';
        case Teacher = 'teacher';
        case Student = 'student';
    }