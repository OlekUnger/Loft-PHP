<?php
class ProfileController
{
    public function actionProfile()
    {
        unset($_SESSION['success']);
        unset($_SESSION['success2']);
        unset($_SESSION['error']);
        unset($_SESSION['error2']);

        Login::checkLogged();
        Profile::getSession();

        if (isset($_POST['send'])) {
            Profile::sendUserData();
        }

        if (isset($_POST['sendPost'])) {
            Profile::sendUserPost();
        }

        Twig::getContent('/profile/profile.twig', array('title' => 'Личный кабинет',
            'postlogin' => $_POST['login'],
            'login' => $_SESSION['login'],
            'name' => $_SESSION['name'],
            'description' => $_SESSION['description'],
            'age' => $_SESSION['age'],
            'success' => $_SESSION['success'],
            'error' => $_SESSION['error'],
            'success2' => $_SESSION['success2'],
            'error2' => $_SESSION['error2'],
            'sendTitle' => $_POST['sendTitle'],
            'sendText' => $_POST['sendText'],
            'activePage' => $_SERVER['REQUEST_URI']
        ));
        return true;
    }

    public function actionPost($postId)
    {
        Login::checkLogged();
        Profile::getSession();
        unset($_SESSION['success']);
        unset($_SESSION['success2']);
        unset($_SESSION['error']);
        unset($_SESSION['error2']);
        $postItem = Profile::getPostById($postId);
        if (isset($_POST['editPost'])) {

            $errors = Validate::is_validEditPost();

            $error = Profile::checkImage('pic');
            if ($error) {
                $errors[] = $error;
            }

            if (empty($errors)) {

                $post = Post::find($postId);
                $post->title = $_POST['editTitle'];
                $post->text = $_POST['editText'];
                $post->save();

                Profile::setPostImage(480, $_POST['editText']);

                $_SESSION['success2'] = 'Правки сделаны';
                header('Refresh:.5; url=/users/' . $postItem['user_id']);
            } else {
                $_SESSION['error2'] = array_shift($errors);
            }
        }

        if ($postId) {
            Twig::getContent('/profile/post.twig', array('title' => 'Редактирование статьи', 'main' => 'userlist',
                'name' => $_SESSION['name'],
                'login' => $_SESSION['login'],
                'success2' => $_SESSION['success2'],
                'error2' => $_SESSION['error2'],
                'postItem' => $postItem,
            ));
            return true;
        }
    }
}