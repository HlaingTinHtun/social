<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statuslike extends Model
{
    public $timestamps =true;
    protected $table='user_status_likes';
    protected $guarded =['id'];

    public function status(){
        return $this->hasOne(status::class);
    }
}
