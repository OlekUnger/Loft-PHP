<?php

function head($title)
{
    echo
    "<!doctype html>
<html lang='en'>
    <head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link rel='stylesheet' href='./../css/style.css'>
    <title>$title</title>
</head>";
}

function menu()
{
    if (!empty($_SESSION['name'])) {
        $user_name = $_SESSION['name'];
    } else {
        $user_name = 'noname';
    }

    $menu_unlogin =
        "<ul class='clearfix'>
            <li class='left'><a href='index.php'>Главная</a></li>
            <li class='right'><a href='login.php'>Вход</a></li>
            <li class='right'><a href='register.php'>Регистрация</a></li>
        </ul>";

    $menu_login =
        "<ul class='clearfix'>
            <li class='left'><a href='index.php'>Главная</a></li>
            <li class='left'><a href='users_list.php'>Список пользователей</a></li>
            <li class='left'><a href='users_photo.php'>Список файлов</a></li>  
            <li class='right'><a href='profile.php?do=exit'>Выход</a></li>
            <li class='right'><a href='profile.php'>Личный кабинет</a></li>
            <li class='right'><a class='user'>$user_name</a></li>
        </ul>";

    if (isset($_SESSION['login'])) {
        echo $menu_login;
    } else {
        echo $menu_unlogin;
    }
}

function message($class, $text, $url)
{
    $_SESSION['message'] = " <div class=$class > $text</div > ";
    header('Location: ' . $url);
    exit();
}

function exist($arg)
{
    if (isset($arg)) echo $arg;
}

function cutImg($src, $dist)
{

    $image = imagecreatefromjpeg($src);
    $size = getimagesize($src);
    $cut = imagecreatetruecolor(100, 100);
    $koeff = $size[0] / 100;
    $new_height = ceil($size[1] / $koeff);
    imagecopyresampled($cut, $image, 0, 0, 0, 0, 100, $new_height, $size[0], $size[1]);
    imagejpeg($cut, $dist, 100);
    imagedestroy($image);

}

