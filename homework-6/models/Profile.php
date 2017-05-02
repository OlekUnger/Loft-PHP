<?php

class Profile
{

    public static function getSession()
    {
        $connection = Db::getConnection();
        $sql = "SELECT * FROM users WHERE login ='{$_SESSION['login']}'";
        $result = $connection->query($sql);
        while ($row = $result->fetch()) {
            if ($row['name']) {
                $_SESSION['name'] = $row['name'];
            } else {
                $_SESSION['name'] = 'Noname';
            }
            $_SESSION['description'] = $row['description'];
            $_SESSION['age'] = $row['age'];
        }
    }

    public static function setName()
    {
        if (isset($_SESSION['name'])) {
            echo $_SESSION['name'];
        } else {
            echo 'Noname';
        }
        if ($_SESSION['name'] == ' ') {
            $_SESSION['name'] = 'Noname';
            echo $_SESSION['name'];
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

    public static function setImage()
    {
        $connection = Db::getConnection();
        $sql = "SELECT * FROM users WHERE login ='{$_SESSION['login']}'";
        $result = $connection->query($sql);
        $row = $result->fetch();
        $filename = $row['id'] . '.jpg';
        move_uploaded_file($_FILES['photo']['tmp_name'], 'template/Photos/' . $filename);
        $sql = "UPDATE `users` SET foto='$filename' WHERE login='{$_SESSION['login']}'";
        $connection->query($sql);
        Users::image('template/Photos/' . $filename, 'template/Photos/' . $filename, '200');

    }

}

