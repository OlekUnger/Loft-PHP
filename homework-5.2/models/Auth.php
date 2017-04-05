<?php

class Auth
{
    public static function userRegister($login, $password2)
    {
        $connection = Db::getConnection();
        $sql = "INSERT INTO users VALUES('', '$login', SHA('$password2'), '','','','' )";
        $connection->exec($sql);
    }

    public static function checkLoginExists($login)
    {
        $connection = Db::getConnection();
        $sql = "SELECT * FROM users WHERE login = '$login'";
        $result = $connection->query($sql);
        $connection->exec($sql);
        if ($result->fetchColumn()) {
            return true;
        } else {
            return false;
        }
    }

    public static function userLogin($login, $password)
    {
        $connection = Db::getConnection();
        $sql = "SELECT * FROM `users` WHERE `login`='$login' AND `password` =SHA('$password')";
        $result = $connection->query($sql);
        $connection->exec($sql);
        $user = $result->fetch();
        if ($user) {
            return $user['login'];
        } else {
            return false;
        }
    }

    public static function enter($userLogin)
    {
        $_SESSION['login'] = $userLogin;
    }

    public static function checkLogged()
    {

        if (isset($_SESSION['login'])) {
            return $_SESSION['login'];
        }
        header('Location: /login');
        exit();
    }

    public static function isGuest()
    {
        if (isset($_SESSION['login'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function message()
    {
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            return false;
        }
    }

    public static function getSession()
    {
        $connection = Db::getConnection();
        $sql = "SELECT * FROM users WHERE login ='{$_SESSION['login']}'";
        $result = $connection->query($sql);
        while ($row = $result->fetch()) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['description'] = $row['description'];
            $_SESSION['age'] = $row['age'];
        }
    }

//    public static function setNameInto

    public static function setName()
    {
        if (isset($_SESSION['name'])) {
            echo $_SESSION['name'];
        } else {
            echo 'Noname';
        }
    }

    public static function setDescription()
    {
        if (isset($_SESSION['description'])) {
            echo $_SESSION['description'];
        } else {
            echo '';
        }
    }

    public static function setAge()
    {
        if (isset($_SESSION['age'])) {
            echo $_SESSION['age'];
        } else {
            echo '';
        }
    }

    public static function setLogin()
    {
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
        } else {
            echo '';
        }
    }
}
