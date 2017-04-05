<?php

class Profile
{
    public static function userProfile()
    {
        if (isset($_POST['send'])) {
            $connection = Db::getConnection();
            $name = preg_replace('/[<>]/', '', ($_POST['name']));
            $description = preg_replace('/[<>]/', '', ($_POST['description']));
            $age = $_POST['age'];
            $errors = [];
            if ($name == '') {
                $sql = "SELECT name FROM users WHERE login ='{$_SESSION['login']}'";
                $result = $connection->query($sql);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                if (empty($row['name'])) {
                    $errors[] = 'Введите имя';
                }
            } else {
                $sql = "UPDATE users SET name='$name' WHERE login='{$_SESSION['login']}'";
                $connection->query($sql);
            }
            if ($_POST['photo']) {

                if ($_FILES['photo']['type'] != 'image/jpeg' && $_FILES['photo']['type'] != 'image/png' && $_FILES['photo']['type'] != 'image/gif') {
                    $errors[] = 'Неверный формат изображения';
                }
                if ($_FILES['photo']['size'] > 400000) {
                    $errors[] = 'Размер картинки слишком большой';
                }
            }
            if (empty($errors)) {
                $sql = "SELECT * FROM users WHERE login ='{$_SESSION['login']}'";
                $result = $connection->query($sql);
                $row = $result->fetch();
                $filename = $row['id'] . '.jpg';
                move_uploaded_file($_FILES['photo']['tmp_name'], 'template/Photos/' . $filename);
                Profile::cutImg('template/Photos/' . $filename, 'template/Photos/' . $filename);
                if ($result) {
                    if ($description != '') {
                        $sql = "UPDATE users SET description='$description' WHERE login='{$_SESSION['login']}'";
                        $connection->query($sql);
                        $connection->exec($sql);
                    }
                    if ($age != '') {
                        $sql = "UPDATE `users` SET age='$age' WHERE login='{$_SESSION['login']}'";
                        $connection->query($sql);
                        $connection->exec($sql);
                    }
                    $sql = "UPDATE `users` SET foto='$filename' WHERE login='{$_SESSION['login']}'";
                    $connection->query($sql);
                    $connection->exec($sql);

                    $_SESSION['message'] = "<div class='success'>Данные отправлены</div>";
                    header('Refresh:.5; url=profile');
                } else {
                    $_SESSION['message'] = "<div class='success'>Загрузка не удалась</div>";
                }

            } else {
                $error = array_shift($errors);
                $_SESSION['message'] = "<div class='error'>$error</div>";
            }
        }
    }
    
    public static function cutImg($src, $dist)
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
}