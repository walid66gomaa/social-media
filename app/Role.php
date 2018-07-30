<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
       return $this->belongstoMany('App\User','user_role','role_id','user_id');
    }
}
