<?php
include (ROOT.'/config/connect.php');
//require_once ROOT . '/libs/Eloquent.php';
//require_once '../libs/Eloquent.php';// для корректной работы Faker

class CategoryTable extends Illuminate\Database\Eloquent\Model
{
    protected $table = "categories";
    protected $quarded = ['id'];
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('Product', 'category_id', 'id');
    }

    public function products2()
    {
        return $this->belongsTo('Product', 'category_id', 'id');
    }

}