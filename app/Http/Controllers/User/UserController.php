<?php

namespace App\Http\Controllers\User;

use App\checkemail;

use App\Http\Requests\UpdateUserRequest;
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
        return view('common/profile');
    }



    public function insert(UserRequest $request)


    {
        $request->validate();

//        $validator = Validator::make($request->all(), [
//            'name' => 'required',
//            'image'=>'required',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|'
//        ]);
//        if ($validator->fails()) {
////            echo "error";
//            return redirect('register')
//                ->withErrors($validator)
//                ->withInput();
//        }else {

//            $name = $request->input('name');
        $name =Input::get('name');
//            dd($name);
            $email = $request->input('email');
//        dd($email);
            $password = bcrypt($request->input('password'));
            $image = $request->file('image');
//        dd($image);

            $imageName = $image->getClientOriginalName();
            $destination = 'uploads';
            $image->move($destination, $imageName);
            $this->userRepository->insert($name, $imageName, $email, $password);
            return view('auth/login');
        }
//        $this->user->authenticate($email, $password);



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

