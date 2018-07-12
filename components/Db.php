<?php

class Db
{
    public static function getConnection()
    {
        $parametrsConn = include(ROOT.'/config/db_params.php');
        $dsn= "mysql:host={$parametrsConn['host']};dbname={$parametrsConn['dbname']}";

        $db = new PDO($dsn,$parametrsConn['user'],$parametrsConn['password'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $db->exec("set names utf8");
        return $db;
    }
}