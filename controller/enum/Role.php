<?php
    namespace controller\enum;
    enum Role: String
    {
        case Admin = 'admin';
        case Teacher = 'teacher';
        case Student = 'student';
    }