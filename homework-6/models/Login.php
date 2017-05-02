<?php

class Login
{
    public static function userLogin($login, $password)
    {
        $connection = Db::getConnection();
        $sql = "SELECT * FROM `users` WHERE `login`='$login' AND `password` =SHA('$password')";
        $result = $connection->query($sql);
        $connection->exec($sql);
        $user = $result->fetch();
        if ($user) {
            return $user['login'];
        } else {
            return false;
        }
    }

    public static function enter($userLogin)
    {
        $_SESSION['login'] = $userLogin;
    }

    public static function checkLogged()
    {

        if (isset($_SESSION['login'])) {
            return $_SESSION['login'];
        }
        header('Location: /login');
        exit();
    }

    public static function isGuest()
    {
        if (isset($_SESSION['login'])) {
            return true;
        } else {
            return false;
        }
    }
}