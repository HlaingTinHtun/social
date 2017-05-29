<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statuscomment extends Model
{
    public $timestamps =true;
    protected $table='users_status_comment';
    protected $guarded =['id'];

    public function status(){
        return $this->hasOne(status::class);
    }

    public function users(){
        return $this->belongsTo('app/users');
    }
}
