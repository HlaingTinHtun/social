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

    /**
     * UserRepository constructor.
     * @param users $users
     *
     */
    public function __construct(Users $users)
    {
        $this->users =$users;
    }

    /**
     * @param $name
     * @param $imageName
     * @param $email
     * @param $password
     * This function is to create the customer
     */
    public function insert($name,$imageName,$email,$password)
    {
       $this->users->create(['name'=>$name,'image'=>$imageName,'email'=>$email,'password'=>$password]);

    }

    /**
     * @param $id
     * @param $name
     * @param $imageName
     * @param $coverName
     * This function is to update the user's all informations.
     */
    public function allupdate($id,$name,$imageName,$coverName)
    {
        $this->users->where('id','=',$id)->update(['name'=>$name,'image'=>$imageName,'cover_photo'=>$coverName]);
    }

    /**
     * @param $id
     * @param $name
     *
     * This function is to update the the name only.
     */

    public function update($id,$name)
    {
        $this->users->where('id','=',$id)->update(['name'=>$name]);
    }

    /**
     * @param $id
     * @param $name
     * @param $imageName
     * This function is to update the user information except coverphoto
     */
    public function noCoverUpdate($id,$name,$imageName)
    {
        $this->users->where('id','=',$id)->update(['name'=>$name,'image'=>$imageName]);

    }

    /**
     * @param $id
     * @param $name
     * @param $coverName
     * This function is to update the user information except image
     */
    public function noImageUpdate($id,$name,$coverName)
    {
        $this->users->where('id','=',$id)->update(['name'=>$name,'cover_photo'=>$coverName]);
    }
}