<?php
class Login
{
    public static function userLogin($login, $password)
    {
        $connect = Db::where('login', '=', $login)->where('password', '=', $password)->first();
        if ($connect) {
            return $connect->login;
        } else {
            return false;
        }
    }

    public static function enter()
    {
        $connect = Db::where('login', '=', $_POST['login'])->first();
        $_SESSION['login'] = $connect->login;
        return $_SESSION['login'];
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['login'])) {
            return $_SESSION['login'];
        }
        header('Location: /login');
        exit();
    }
}