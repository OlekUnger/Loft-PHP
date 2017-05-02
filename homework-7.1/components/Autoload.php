<?php
function __autoload($class_name)
{

    $array_paths = array(

        '/models/',
        '/components/',
    );
    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path)) {
            require $path;
        }
    }
//    require_once '../vendor/autoload.php';
}