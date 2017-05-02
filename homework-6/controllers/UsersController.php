<?php
include_once ROOT . '/models/Login.php';
include_once ROOT . '/models/Users.php';
include_once ROOT . '/models/View.php';

class UsersController
{
    public function actionUsers()
    {
        Login::checkLogged();
        View::getContent('/users/users.twig', array('title' => 'Список пользователей', 'main' => 'userlist',
            'name' => $_SESSION['name'],
            'login' => $_SESSION['login'],
            'userslist' => Users::getUsersList(),
        ));
        return true;
    }

    public function actionUser($id)
    {
        Login::checkLogged();
        $userItem = Users::getUserById($id);
        $text = $userItem['name'];
        $img = "template/Photos/" . $userItem['foto'];
        $dist = 'template/Photos/user.jpg';
        Users::imgRotateAndWatermark($text, $img, $dist);
        if ($id) {
            View::getContent('/users/user.twig', array('title' => 'Файлы пользователя', 'main' => 'userlist',
                'name' => $_SESSION['name'],
                'login' => $_SESSION['login'],
                'userItem' => $userItem,
            ));
            return true;
        }
    }
}