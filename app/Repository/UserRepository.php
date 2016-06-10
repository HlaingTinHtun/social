<?php
/**
 * Created by PhpStorm.
 * User: thirisandaroo
 * Date: 5/26/16
 * Time: 10:54 AM
 */

namespace App\Repository;


use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface{


    public function insert($name,$imageName,$email,$password){
        DB::table('users')
            ->insert(['name'=>$name,'image'=>$imageName,'email'=>$email,'password'=>$password]);
//

    }
    public function allupdate($id,$name,$imageName,$email){
        DB::table('users')->where('id','=',$id)
            ->update(['name'=>$name,'image'=>$imageName,'email'=>$email]);
    }

    public function update($name,$email){
        DB::table('users')
            ->update(['name'=>$name,'email'=>$email]);
    }

}