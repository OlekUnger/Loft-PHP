<?php
class Register
{
    public static function getRegister()
    {
        if (isset($_POST['reg_up'])) {
            $login = preg_replace('/[<>]/', '', ($_POST['login']));
            $password = preg_replace('/[<>]/', '', ($_POST['password']));
            $password2 = preg_replace('/[<>]/', '', ($_POST['password2']));
            $errors = [];
            if ($login == '') {
                $errors[] = 'Введите логин';
            }
            if ($password == '') {
                $errors[] = 'Введите пароль';
            }
            if ($password != $password2) {
                $errors[] = 'Пароли не совпадают';
            }
            if (Auth::checkLoginExists($login)) {
                $errors[] = 'Такой логин существует';
            }
            if ($errors == false) {
                Auth::userRegister($login, $password2);
                $userLogin = Auth::userLogin($login, $password);
                Auth::enter($userLogin);
                $_SESSION['message'] = "<div class='success'>Вы зарегистрированы</div>";
                header('Refresh:.2; url=/');
            } else {
                $error = array_shift($errors);
                $_SESSION['message'] = "<div class='error'>$error</div>";
            }
        }
    }
}