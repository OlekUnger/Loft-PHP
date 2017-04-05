<?php

class AuthController
{
    public function actionRegister()
    {
        Register::getRegister();
        require_once(ROOT . '/views/auth/register.php');
        return true;
    }

    public function actionLogin()
    {
        Login::getLogin();
        Auth::getSession();
        require_once(ROOT . '/views/auth/login.php');
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