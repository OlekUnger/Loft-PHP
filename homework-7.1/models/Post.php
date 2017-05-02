<?php
class Post extends Illuminate\Database\Eloquent\Model
{
    protected $quarded = ['id'];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo('Db', 'user_id','id');
    }
}