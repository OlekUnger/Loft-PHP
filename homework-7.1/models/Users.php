<?php
class Users
{
    public static function getUserById($id)
    {
        $id = intval($id);
        if ($id) {
            $connect = Db::where('id', '=', $id)->get()->toArray();
            $userItem = $connect[0];
            return $userItem;
        }
    }

    public static function getUsersList()
    {
        $connect = Db::orderBy('age', 'desc')->get()->toArray();
        foreach ($connect as $user) {
            if ($user['age'] < 18) {
                $user['age'] = 'Несовершеннолетний';
            } else {
                $user['age'] = 'Совершеннолетний';
            }
        }
        return $connect;
    }

    public static function getUserPosts($id)
    {
        if ($id) {
            $connect = Post::where('user_id', '=', $id)->take(5)->get()->toArray();
            return $connect;
        }
    }

    public static function deleteUserPost()
    {
        $id = (int)$_GET['delete'];
        $connect = Post::where('id', '=', $id)->first();
        $postId = $connect->id;
        $userId=$connect->users->id;
        $img="template/Pics/" . $postId . ".jpg";
        if(is_uploaded_file($img)){
            unlink($img);
        }
        Post::find($_GET['delete'])->delete();
        $_SESSION['delete'] = "Статья удалена";
        header('Refresh:.5; url=/users/' . $userId);

    }
}
