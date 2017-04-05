<?php
class Login
{
    public static function getLogin(){
        if (isset($_POST['enter'])) {
            $login = preg_replace('/[<>]/', '', ($_POST['login']));
            $password = preg_replace('/[<>]/', '', ($_POST['password']));
            $errors = [];
            if ($login == '') {
                $errors[] = 'Введите логин';
            }
            if ($password == '') {
                $errors[] = 'Введите пароль';
            }

            if ($errors==false) {
                $userLogin = Auth::userLogin($login, $password);
                if ($userLogin == false) {
                    $_SESSION['message'] = "<div class='error'>Неверный логин или пароль</div>";
                } else {
                    Auth::enter($userLogin);
                    header('Location: /');
                }

            } else {
                $error = array_shift($errors);
                $_SESSION['message'] = "<div class='error'>$error</div>";
            }
        }
    }
}