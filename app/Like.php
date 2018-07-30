<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function post()
    {
    	return $this->belongsTo(Post::Class);
    }


    public function User()
    {
    	return $this->belongsTo(User::Class);
    }
}
