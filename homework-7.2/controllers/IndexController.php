<?php

class IndexController
{
    public function action()
    {
//        Profile::getSession();
        Twig::getContent('index.twig', array('title' => 'Главная страница',
            'main'=>'main',
            'activePage' => $_SERVER['REQUEST_URI']
        ));
        return true;
    }
}
