<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class checkemail extends Model
{
   public function checkemail($id,$email){


       $check =0;
       if(($id == Auth::user()->id) && ($email == Auth::user()->email)) {
           $check = 1;
           return $check;
       }else {

           foreach (Users::get('email') as $e) {
              if($e == $email){
                  $check = 2;
              }

           }
           return $check;
       }

   }
}
