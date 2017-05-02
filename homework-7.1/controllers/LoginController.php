<?php
class LoginController
{
    public function actionLogin()
    {
        unset($_SESSION['success']);
        unset($_SESSION['error']);
        $errors = Validate::is_validEnter();
        if (isset($_POST['enter'])) {
            if (empty($errors)) {
                $userLogin = Login::userLogin($_POST['login'], SHA1($_POST['password']));
                if($userLogin){
                    Login::enter();
                    $_SESSION['success'] = "Вход выполнен";
                    header('Refresh:.5; /');
                }else{
                    $_SESSION['error'] = "Неверный логин или пароль";
                }
            } else {
                $_SESSION['error'] = array_shift($errors);
            }
        }

        Profile::getSession();
        Twig::getContent('/login/login.twig', array('title' => 'Вход',
            'postlogin' => $_POST['login'],
            'name' => $_SESSION['name'],
            'login' => $_SESSION['login'],
            'success' => $_SESSION['success'],
            'error' => $_SESSION['error'],
            'loginPageActive' => 'active',
            'activePage' => $_SERVER['REQUEST_URI']
        ));

        return true;
    }
}