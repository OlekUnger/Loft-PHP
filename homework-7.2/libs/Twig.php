<?php

class Twig
{
    public static function getContent($page,$vars=null){

        $loader = new Twig_Loader_Filesystem(ROOT.'/views');
        $twig = new Twig_Environment($loader);

//            array('cache'=>dirname(_DIR_).'/cache'));
        echo $twig->render($page,$vars);
    }
}