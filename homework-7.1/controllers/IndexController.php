<?php
class IndexController
{
    public function action()
    {
        Profile::getSession();
        Twig::getContent('index.twig', array('title' => 'Главная страница',
            'login' => $_SESSION['login'],
            'name' => $_SESSION['name'],
            'activePage' => $_SERVER['REQUEST_URI']
        ));
        return true;
    }
}
