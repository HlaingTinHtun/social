<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserRequest;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    private $userRepository;


    public function __construct(UserRepositoryInterface $userRepository)

    {

        $this->userRepository = $userRepository;


    }

    public function index(){
        return view('common/profile');
    }



    public function insert(UserRequest $request)
    {

        $name = $request->get('name');
        $email = $request->get('email');
        $password = bcrypt($request->get('password'));


        $image = $request->file('image');

        $imageName = $image->getClientOriginalName();
        $destination = 'profile';
        $image->move($destination, $imageName);
        $this->userRepository->insert($name, $imageName, $email, $password);
        return view('auth/login');
//        $this->user->authenticate($email, $password);

    }

    public function update(Request $request){

        $id =Input::get('id');
        $name =Input::get('name');
        $email=Input::get('email');
        $image =$request->file('image');
//        dd($image);

        if(!empty($image)) {

            $imageName = $image->getClientOriginalName();
            $destination = 'uploads';
            $image->move($destination, $imageName);
            $pic = $this->userRepository->allupdate($id,$name, $imageName, $email);

            return Redirect::to('commom.profile')->with('pic', $pic);
        }
        else{

            $pic = $this->userRepository->update($name,$email);
            return Redirect::to('commom.profile')->with('pic', $pic);



        }



    }



}

