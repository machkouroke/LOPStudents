<?php

    use model\beans\Faculty;
    use model\beans\Student;
    use model\beans\Factory;
    use model\beans\Module;
    use model\beans\Teacher;

    require_once('Factory.php');
    require_once('User.php');
    require_once('Student.php');
    require_once('Teacher.php');
    require_once('Module.php');
    require_once('Faculty.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller\Constant.php');

    print('<pre>');
    print_r(Student::getAll(1, 1));
    print('</pre>');

//    header("Location:classe.php");

