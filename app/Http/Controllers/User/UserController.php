<?php

namespace App\Http\Controllers\User;

use App\checkemail;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
use App\Repository\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
class UserController extends Controller
{
    private $userRepository;


    public function __construct(UserRepositoryInterface $userRepository,checkemail $check)

    {

        $this->check =$check;
        $this->userRepository = $userRepository;


    }

    public function index(){
//        if(Auth::user()->id == $id) {

            return view('common/profile');
//        }else {
//            $guest  = user::find($id);
//            dd($guest);
//
//            return view('common/guest')->with('guest',$guest);
//        }
    }



    public function insert(UserRequest $request)


    {
        $request->validate();
        $name =Input::get('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $image = $request->file('image');


            $imageName = $image->getClientOriginalName();
            $destination = 'uploads';
            $image->move($destination, $imageName);
            $this->userRepository->insert($name, $imageName, $email, $password);
            return view('auth/login');
        }




    /**
     * @param UpdateUserRequest $request
     * @return string
     */
    public function update(UpdateUserRequest $request){

        $id =Input::get('id');
        $name =Input::get('name');
        $image =Input::file('image');
        if(!empty($image)) {
                $imageName = $image->getClientOriginalName();
                $destination = 'uploads';
                $image->move($destination, $imageName);
                $pic = $this->userRepository->allupdate($id,$name, $imageName);

                return Redirect::to('social/profile')->with('pic', $pic);
            }
            else{
                $pic = $this->userRepository->update($id,$name);
                return Redirect::to('social/profile')->with('pic', $pic);
            }
    }






}

