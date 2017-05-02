<?php
class Profile
{

    public static function getSession()
    {
        $connect = Db::where('login', '=', $_SESSION['login'])->get()->toArray();
        if ($connect[0]['name']) {
            $_SESSION['name'] = $connect[0]['name'];
        } else {
            $_SESSION['name'] = 'Noname';
        }
        $_SESSION['description'] = $connect[0]['description'];
        $_SESSION['age'] = $connect[0]['age'];
        $_SESSION['id'] = $connect[0]['id'];
    }

    public static function checkImage($fieldName)
    {
        if (is_uploaded_file($_FILES[$fieldName]['tmp_name'])) {

            if ($_FILES[$fieldName]['type'] != 'image/jpeg' && $_FILES[$fieldName]['type'] != 'image/png' && $_FILES[$fieldName]['type'] != 'image/gif') {
                $error = 'Неверный формат изображения';
            }
            if ($_FILES[$fieldName]['size'] > 400000) {
                $error = 'Размер картинки слишком большой';
            }
            return $error;
        }
    }

    public static function setUserImage($size)
    {
        $id = $_SESSION['id'];
        $connect = Db::where('id', '=', $id)->first();
        $filename = $connect->id . '.jpg';
        move_uploaded_file($_FILES['photo']['tmp_name'], 'template/Photos/' . $filename);
        $user = Db::find($id);
        $user->foto = $filename;
        $user->save();
        if (is_uploaded_file($filename)) {
            InterventImage::image('template/Photos/' . $filename, 'template/Photos/' . $filename, $size);
        }
    }

    public static function setPostImage($size, $imgFieldName)
    {
        $connect = Post::where('text', '=', $imgFieldName)->first();
        $postId = $connect->id;
        $filename = $postId . '.jpg';
        move_uploaded_file($_FILES['pic']['tmp_name'], 'template/Pics/' . $filename);
        $post = Post::find($postId);
        $post->picture = $filename;
        $post->save();
        if(is_uploaded_file($filename)){
            InterventImage::imageBad('template/Pics/' . $filename, 'template/Pics/' . $filename, $size);
        }
    }

    public static function getPostById($postId)
    {
        $postId = intval($postId);
        if ($postId) {
            $connect = Post::where('id', '=', $postId)->get()->toArray();
            $postItem = $connect[0];
            return $postItem;
        }
    }

    public static function sendPost()
    {
        $post = new Post();
        $post->user_id = $_SESSION['id'];
        $post->title = $_POST['sendTitle'];
        $post->text = $_POST['sendText'];
        $post->save();
    }

    public static function setUser($id, $description, $age, $name)
    {
        $user = Db::find($id);
        $user->description = $description;
        $user->age = $age;
        $user->name = $name;
        $user->save();
    }

//    -----------------------------------------------
    public static function sendUserData()
    {
        $errors = Validate::is_validUserData();

        if ($_POST['age'] == '-') {
            $errors[] = 'Укажите возраст';
        }
        $error = Profile::checkImage('photo');
        if ($error) {
            $errors[] = $error;
        }

        if (empty($errors)) {
            Profile::setUser($_SESSION['id'], $_POST['description'], $_POST['age'], $_POST['name']);
            Profile::setUserImage(200);

            $_SESSION['success'] = 'данные отправлены';
            header('Refresh:.5; url=profile');
        } else {
            $_SESSION['error'] = array_shift($errors);
        }
    }

    public static function sendUserPost()
    {
        $errors2=Validate::is_validUserPost();

        $error = Profile::checkImage('pic');
        if ($error) {
            $errors2[] = $error;
        }
        if (empty($errors2)) {
            Profile::sendPost();
            Profile::setPostImage(480, $_POST['sendText']);

            $_SESSION['success2'] = 'Данные отправлены';
            header('Refresh:.5; url=users/' . $_SESSION['id']);
        } else {
            $_SESSION['error2'] = array_shift($errors2);
        }
    }
}
