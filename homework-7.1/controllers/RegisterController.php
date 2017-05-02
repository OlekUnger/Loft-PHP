<?php
class RegisterController
{
    public function actionRegister()
    {
        unset($_SESSION['success']);
        unset($_SESSION['error']);
        $_POST['ip'] = $_SERVER['REMOTE_ADDR'];
        $errors = Validate::is_validRegister();
        if (isset($_POST['reg_up'])) {

            if (Register::checkLoginExists()) {
                $errors[] = 'Такой логин существует';
            }
            if (empty($_POST['g-recaptcha-response'])) {
                $errors[] = 'Подтвердите что вы не робот';
            }
            if (empty($errors)) {
                if (Register::captcha()) {
                    Register::userRegister($_POST['login'], $_POST['password2'], $_POST['ip']);

                    Login::enter();

                    PHPMail::sendEmail($_POST['email'], $_POST['login']);

                    $_SESSION['success'] = 'Вы зарегистрированы';
                    header('Refresh:.5; url= /');
                }
            } else {
                $_SESSION['error'] = array_shift($errors);
            }
        }

        Twig::getContent('/register/register.twig', array('title' => 'Регистрация',
            'postlogin' => $_POST['login'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'success' => $_SESSION['success'],
            'error' => $_SESSION['error'],
            'activePage'=>$_SERVER['REQUEST_URI']
        ));

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