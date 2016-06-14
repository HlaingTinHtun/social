<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


    public $timestamps =true;
    protected $table='users';
    protected $guarded =['id'];
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


    public function like()
    {
        return $this->hasMany('App\like');
    }
    public function article(){
        return $this->hasMany('App\article');
    }
    public function getAvatar(){
       return  "https://www.gravatar.com/avatar/".md5($this->email).'?d=rm';
    }
}
