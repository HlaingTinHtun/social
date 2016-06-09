<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    public $timestamps =true;
    protected $table='users';
    protected $guarded =['id'];


    public function users_status(){
       return  $this->hasMany('app/status');
    }

    public function statuscomment(){
        return $this->hasMany('app/statuscomment');
    }

}
