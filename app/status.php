<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    public $timestamps =true;
    protected $table='users_status';
    protected $guarded =['id'];



    public function comments(){
        return $this->hasMany(statuscomment::class);

    }

    public function users(){
        return $this->belongsTo('app/users');
    }
}
