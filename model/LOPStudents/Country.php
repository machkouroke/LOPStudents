<?php

namespace model\LOPStudents;

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