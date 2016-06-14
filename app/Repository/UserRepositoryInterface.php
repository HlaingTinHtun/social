<?php
/**
 * Created by PhpStorm.
 * User: thirisandaroo
 * Date: 5/26/16
 * Time: 10:54 AM
 */

namespace App\Repository;


interface UserRepositoryInterface {

    public function insert($name,$imageName,$email,$password);
    public function allupdate($id,$name,$imageName);
    public function update($id,$names);

}