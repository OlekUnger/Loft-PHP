<?php
use Intervention\Image\ImageManagerStatic as Image;

class Users
{
    public static function getUserById($id)
    {
        $id = intval($id);
        if ($id) {
            $connection = Db::getConnection();
            $result = $connection->query('SELECT * FROM users WHERE id=' . $id);
            $userItem = $result->fetch(PDO::FETCH_ASSOC);
            return $userItem;
        }
    }

    public static function getUsersList()
    {
        $connection = Db::getConnection();
        $usersList = array();

        $result = $connection->query("SELECT * FROM `users` ORDER BY `age` DESC");

        $i = 0;
        while ($row = $result->fetch()) {
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['age'] = $row['age'];
            if ($row['age'] >= 18) {
                $usersList[$i]['name'] = $row['name'] . ' Совершеннолетний';

            } else {
                $usersList[$i]['name'] = $row['name'] . '  Несовершеннолетний';
            }

            $usersList[$i]['description'] = $row['description'];
            $usersList[$i]['photo'] = $row['foto'];
            $i++;
        }
        return $usersList;
    }

    public static function image($img, $dist, $size)
    {
        $image = Image::make($img)
            ->resize($size, null, function ($image) {
                $image->aspectRatio();
            })
            ->save($dist);
        return $image;
    }

    public static function imgRotateAndWatermark($text, $img, $dist)
    {
        $image = Image::make($img);
        $image->rotate(45)->text($text,$image->width()/2,$image->height()/2, function($font){
            $font->file('template/arvoRegular.ttf');
            $font->size('30');
            $font->color('#00ff77');
            $font->align('center');
            $font->valign('bottom');

        })->save($dist,100);
        return $image;
    }
}
