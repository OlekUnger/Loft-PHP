<?php
class View
{
    public static function getContent($page,$vars=null){

        $loader = new Twig_Loader_Filesystem(dirname(_DIR_).'/views');
        $twig = new Twig_Environment($loader);
//            array('cache'=>dirname(_DIR_).'/cache'));
        echo $twig->render($page,$vars);
    }
}