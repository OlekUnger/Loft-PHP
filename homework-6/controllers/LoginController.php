<?php
include_once ROOT . '/models/Login.php';
include_once ROOT . '/models/Profile.php';
include_once ROOT . '/models/View.php';

class LoginController
{
    public function actionLogin()
    {
        unset($_SESSION['success']);
        unset($_SESSION['error']);
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

            if ($errors == false) {
                $userLogin = Login::userLogin($login, $password);
                if ($userLogin == false) {
                    $_SESSION['error'] = "Неверный логин или пароль";
                } else {
                    Login::enter($userLogin);
                    $_SESSION['success'] = "Вход выполнен";
                    header('Refresh:.5; /');
                }
            } else {
                $_SESSION['error'] = array_shift($errors);
            }
        }

        Profile::getSession();
        View::getContent('/login/login.twig', array('title' => 'Вход',
            'postlogin' => $_POST['login'],
            'name' => $_SESSION['name'],
            'login' => $_SESSION['login'],
            'success' => $_SESSION['success'],
            'error' => $_SESSION['error']));

        return true;
    }
}