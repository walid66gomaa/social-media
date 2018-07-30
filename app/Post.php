<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
    'title','body','url'];

    public function comments()
    {
    	return $this->hasMany(Comment::Class);
    }


    public function category()
    {
    	return $this->belongsTo(category::Class);
    }
    public function likes()
    {
        return $this->hasMany(Like::Class);
    }

        public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
