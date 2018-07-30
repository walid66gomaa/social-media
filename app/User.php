<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
       return $this->belongstoMany('App\Role','user_role','user_id','role_id');
    }


    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            
            foreach ($roles as $role) {
               if ($this->hasRole($role)) {
                   # code...
                return true;
               }
            }

                    }

                      else
            {


                 if ($this->hasRole($role)) {
                   # code...
                return true;
               }
            }
    }



public function hasRole($role)
{
   if ($this->roles()->where('name',$role)->first()) {
       # code...
           return true;

   }
}

 public function likes()
    {
        return $this->hasMany(Like::Class);
    }


    public function posts()
    {
        return $this->hasMany(Post::Class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::Class);
    }

}
