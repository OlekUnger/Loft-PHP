<?php
class Register
{
    public static function checkEmail($email)
    {
        if ($email != '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkLoginExists()
    {
        $connect = Db::where('login', '=', $_POST['login'])->first();
        if ($connect[0]['login']) {
            return true;
        } else {
            return false;
        }
    }

    public static function userRegister($login, $password2, $ip)
    {
        $password2 = SHA1($password2);
        $user = new Db;
        $user->ip = $ip;
        $user->login = $login;
        $user->password = $password2;
        $user->save();
    }

    public static function captcha()
    {
        if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
            $secret = '6Ld3SxwUAAAAALJrbKJAMtM3g8SNFTERzYrySo53';
            $ip = $_SERVER['REMOTE_ADDR'];
            $captcha = $_POST['g-recaptcha-response'];
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
            $arr = json_decode($response, true);
            if ($arr['success']) {
                return true;
            } else {
                return false;
            }
        }
    }
}