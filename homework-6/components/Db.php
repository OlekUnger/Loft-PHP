<?php


class Db
{
    public static function getConnection()
    {
        $host = 'localhost';
        $db = 'db';
        $user = 'root';
        $password = '';

        $connection = new PDO("mysql:host=$host; dbname=$db", $user, $password);
        return $connection;

    }
}