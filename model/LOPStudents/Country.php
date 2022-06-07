<?php

    namespace model\LOPStudents;
    spl_autoload_register(static function (string $path) {
        $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $path . '.php';
        require_once($path);
    });
    require_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controller\Constant.php');

    use PDO;

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
            header('Content-Type: application/json; charset=UTF-8');

            return $res->fetchAll(PDO::FETCH_NUM);
        }

    }

    $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';

    if ($contentType === 'application/json') {
        $content = trim(file_get_contents('php://input'));
        $decoded = json_decode($content, true);
        $data = [];
        foreach (Country::getCityByCountry($decoded['country_id']) as $row) {
            $data[] = utf8_encode($row[0]);
        }
        $reply = json_encode($data);
        header('Content-Type: application/json; charset=UTF-8');

        echo $reply;
    }
