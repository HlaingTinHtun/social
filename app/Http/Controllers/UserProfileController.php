<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserProfileController extends Controller
{
    public function index(){
        return view('common/profile');
    }

    public function profilepicture(Request $request){
        $image =$request->file('image');
        $imageName = $image->getClientOriginalName();
        $destination = 'uploads';
        $image->move($destination, $imageName);
        $pic =users::create([ 'image' => $imageName]);
        return Redirect::to('commom.profile')->with('pic',$pic);

    }

    public function updateprofile(){

    }

}


