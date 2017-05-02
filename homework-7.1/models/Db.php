<?php
class Db extends Illuminate\Database\Eloquent\Model
{
    protected $table = "users";
    protected $quarded = ['id'];
    public $timestamps = false;
    public function posts()
    {
        return $this->hasMany('Post', 'user_id', 'id');
    }
}