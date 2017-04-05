<?php

class IndexController
{
    public function action()
    {
//        Auth::checkLogged();
        require_once(ROOT . '/views/index.php');
        return true;
    }
}