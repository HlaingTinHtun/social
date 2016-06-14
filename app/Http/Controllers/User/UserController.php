<?php

namespace App\Http\Controllers\User;

use App\checkemail;

use App\Http\Requests\UpdateUserRequest;

use App\Http\Requests\UserRequest;
use App\Repository\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    private $userRepository;


    public function __construct(UserRepositoryInterface $userRepository,checkemail $check)

    {

        $this->check =$check;
        $this->userRepository = $userRepository;


    }

    public function index(){
        return view('common/profile');
    }



    public function insert(Request $request)


    {

        $name = $request->get('name');
        $email = $request->get('email');
//        dd($email);
        $password = bcrypt($request->get('password'));
        $image = $request->file('image');
//        dd($image);

        $imageName = $image->getClientOriginalName();
        $destination = 'uploads';
        $image->move($destination, $imageName);
        $this->userRepository->insert($name, $imageName, $email, $password);
        return view('auth/login');
//        $this->user->authenticate($email, $password);

    }

    /**
     * @param UpdateUserRequest $request
     * @return string
     */
    public function update(UpdateUserRequest $request){


//        dd('hello');

        $id =Input::get('id');
        $name =Input::get('name');
        $email=Input::get('email');
        $image =Input::file('image');







        $check= $this->check->checkemail($id,$email);



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

