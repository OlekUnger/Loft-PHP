<?php
class UsersController
{
    public function actionUsers()
    {
        Login::checkLogged();

        Twig::getContent('/users/users.twig', array('title' => 'Список пользователей', 'main' => 'userlist',
            'name' => $_SESSION['name'],
            'login' => $_SESSION['login'],
            'userslist' => Users::getUsersList(),
            'activePage'=>$_SERVER['REQUEST_URI']
        ));
        return true;
    }

    public function actionUser($id)
    {
        Login::checkLogged();
//        unlink('template/Photos/user.jpg');
        $userItem = Users::getUserById($id);
        $userPosts = Users::getUserPosts($id);

//        $img = "template/Photos/" . $userItem['foto'];
//        $text = $userItem['name'];
//        $dist = 'template/Photos/user.jpg';
//
//        InterventImage::imgRotateAndWatermark($id, $text, $img, $dist);

        if (isset($_GET['delete'])) {
            Users::deleteUserPost();
        }
        if ($id) {
            Twig::getContent('/users/user.twig', array('title' => 'Файлы пользователя', 'main' => 'userlist',
                'name' => $_SESSION['name'],
                'login' => $_SESSION['login'],
                'success' => $_SESSION['success'],
                'userItem' => $userItem,
                'userPosts' => $userPosts
            ));
            return true;
        }
    }
}