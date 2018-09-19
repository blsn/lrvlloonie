<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table    = 'posts'; // plural class name is default table name 
    public $primaryKey  = 'id'; // primary key
    public $timestamps  = true;

    public function user(){
        return $this->belongsTo('App\User'); // a post has relationships with a user
    }
}
