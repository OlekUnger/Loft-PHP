<?php
include (ROOT.'/config/connect.php');
//require_once ROOT . '/libs/Eloquent.php';
//require_once '../libs/Eloquent.php';// для корректной работы Faker

class ProductTable extends Illuminate\Database\Eloquent\Model
{
    protected $table = "products";
    public $timestamps = false;

    public function categories()
    {
        return $this->belongsTo('Categories', 'category_id','id');
    }

}