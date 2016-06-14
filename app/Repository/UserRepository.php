<?php
/**
 * Created by PhpStorm.
 * User: thirisandaroo
 * Date: 5/26/16
 * Time: 10:54 AM
 */

namespace App\Repository;


use App\users;


class UserRepository implements UserRepositoryInterface{



    public function __construct(Users $users)

    {

        $this->users =$users;



    }
    public function insert($name,$imageName,$email,$password){
       $this->users->create(['name'=>$name,'image'=>$imageName,'email'=>$email,'password'=>$password]);
//

    }
    public function allupdate($id,$name,$imageName){

        $this->users->where('id','=',$id)
            ->update(['name'=>$name,'image'=>$imageName]);
    }

    public function update($id,$name){


      $this->users->where('id','=',$id)->update(['name'=>$name]);
    }

}