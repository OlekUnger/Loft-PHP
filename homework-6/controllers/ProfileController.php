<?php
include_once ROOT . '/models/Login.php';
include_once ROOT . '/models/Profile.php';
include_once ROOT . '/models/View.php';
include_once ROOT . '/models/Users.php';

class ProfileController
{
    public function actionProfile()
    {
        unset($_SESSION['success']);
        unset($_SESSION['error']);
        Login::checkLogged();
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

            if (is_uploaded_file($_FILES['photo']['tmp_name'])) {

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

                    Profile::setImage();

                    $_SESSION['success'] = 'данные отправлены';
                    header('Refresh:.5; url=profile');

                } else {
                    $_SESSION['error'] = 'Загрузка не удалась';
                }
            } else {
                $_SESSION['error'] = array_shift($errors);
            }
        }

        Profile::getSession();
        View::getContent('/profile/profile.twig', array('title' => 'Личный кабинет',
            'postlogin' => $_POST['login'],
            'login' => $_SESSION['login'],
            'name' => $_SESSION['name'],
            'description' => $_SESSION['description'],
            'age' => $_SESSION['age'],
            'success' => $_SESSION['success'],
            'error' => $_SESSION['error']
        ));
        return true;
    }
}