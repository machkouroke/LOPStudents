<?php

namespace model\LOPStudents;

spl_autoload_register(static function (string $path) {
    $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $path . '.php';
    require_once($path);
});

session_name('Main');
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller\Constant.php');
use controller\MainController;

use controller\AuthenticationController;
use controller\MenuController;
use controller\StudentController;
use controller\TeacherController;
use model\LOPStudents\Factory;
use model\LOPStudents\Teacher;

class Country
{
    public static function getAllCountry(): bool|array
    {
        $con = FACTORY->get_connexion();
        $res = $con->query('Select name from countries');
        return $res->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getCityByCountry(int $id): bool|array
    {
        $con = FACTORY->get_connexion();
        $sql = "select name from cities where country_id='$id'";
        $res = $con->query($sql);
        return $res->fetchAll(\PDO::FETCH_NUM);
    }
}

var_dump(Country::getAllCountry());