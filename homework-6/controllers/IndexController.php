<?php
include_once ROOT . '/models/Profile.php';
include_once ROOT . '/models/View.php';

class IndexController
{
    public function action()
    {
        Profile::getSession();
        View::getContent('index.twig', array('title' => 'Главная страница',
            'login' => $_SESSION['login'],
            'name' => $_SESSION['name']));
        return true;
    }
}