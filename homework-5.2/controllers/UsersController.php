<?php

class UsersController
{
    public function actionUsers()
    {
        Auth::checkLogged();
        $usersList = Users::getUsersList();
        require_once(ROOT . '/views/users/users.php');
        return $usersList;
    }

    public function actionUser($id)
    {
        Auth::checkLogged();
        if ($id) {
            $userItem = Users::getUserById($id);
            require_once(ROOT . '/views/users/user.php');
            return $userItem;
        }
    }
}