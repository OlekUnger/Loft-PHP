<?php
use Intervention\Image\ImageManagerStatic as Image;

class InterventImage
{
    public static function image($img, $dist, $size)
    {
        $image = Image::make($img)
            ->resize($size, null, function ($image) {
                $image->aspectRatio();
            })
            ->save($dist);
        return $image;
    }
    public static function imageBad($img, $dist, $size)
    {
        $image = Image::make($img)
            ->resize($size,$size)->save($dist);
        return $image;
    }

    public static function imgRotateAndWatermark($id,$text, $img, $dist)
    {
        $userItem=Users::getUserById($id);
        if (!empty($userItem['foto'])) {
            $image = Image::make($img);
            $image->text($text, $image->width() / 2, $image->height() / 2, function ($font) {
                $font->file('template/arvoRegular.ttf');
                $font->size('30');
                $font->color('#00ff77');
                $font->align('center');
                $font->valign('bottom');

            })->save($dist, 100);
        }
    }
}