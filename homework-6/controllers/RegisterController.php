<?php
include_once ROOT . '/models/Register.php';
include_once ROOT . '/models/Login.php';
include_once ROOT . '/models/Profile.php';
include_once ROOT . '/models/View.php';

class RegisterController
{
    public function actionRegister()
    {
        unset($_SESSION['success']);
        unset($_SESSION['error']);
        if (isset($_POST['reg_up'])) {
            $login = preg_replace('/[<>]/', '', ($_POST['login']));
            $password = preg_replace('/[<>]/', '', ($_POST['password']));
            $password2 = preg_replace('/[<>]/', '', ($_POST['password2']));
            $email = $_POST['email'];
            $errors = [];
            if ($login == '') {
                $errors[] = 'Введите логин';
            }
            if ($email == '') {
                $errors[] = 'Укажите почту';
            }
            if (Register::checkEmail($email) == false) {
                $errors[] = 'Неправильно указана почта';
            }
            if ($password == '') {
                $errors[] = 'Введите пароль';
            }
            if ($password != $password2) {
                $errors[] = 'Пароли не совпадают';
            }
            if (Register::checkLoginExists($login)) {
                $errors[] = 'Такой логин существует';
            }
            if (empty($_POST['g-recaptcha-response'])) {
                $errors[] = 'Подтвердите что вы не робот';
            }
            if (empty($errors)) {
                if (Register::captcha()) {
                    Register::userRegister($login, $password2);
                    $userLogin = Login::userLogin($login, $password);
                    Login::enter($userLogin);
                    Register::sendEmail($email, $login);
                    $_SESSION['success'] = 'Вы зарегистрированы';
                    header('Refresh:.5; url= /');
                }
            } else {
                $_SESSION['error'] = array_shift($errors);
            }
        }
        View::getContent('/register/register.twig', array('title' => 'Регистрация',
            'postlogin' => $_POST['login'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'success' => $_SESSION['success'],
            'error' => $_SESSION['error']));
        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['login']);
        unset($_SESSION['name']);
        unset($_SESSION['age']);
        unset($_SESSION['description']);
        unset($_SESSION['login']);
        header("Location: /");
    }

}