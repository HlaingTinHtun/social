<?php

namespace App\Http\Controllers\User;

use App\checkemail;

use App\Http\Requests\Request;
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
        return view('common/profile');

    }

    public function guestprofile($id){
        if(Auth::user()->id == $id) {
            return view('common/profile');
        }else {
            $guest  = user::find($id);
            return view('common/guest')->with('guest',$guest);
        }
    }

    public function register(){
        return view('auth.register');
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
        $cover_photo=Input::file('cover_photo');


        if(!empty($image) && (!empty($cover_photo))) {

                $coverName = $cover_photo->getClientOriginalName();
                $destination = 'uploads';
                $cover_photo->move($destination, $coverName);
                $imageName = $image->getClientOriginalName();
                $destination = 'uploads';
                $image->move($destination, $imageName);
                $this->userRepository->allupdate($id,$name, $imageName,$coverName);
            return redirect()->back();
            }

        elseif(!empty($image) && (empty($cover_photo))){


            $imageName = $image->getClientOriginalName();
            $destination = 'uploads';
            $image->move($destination, $imageName);
            $this->userRepository->noCoverUpdate($id,$name, $imageName);
            return redirect()->back();


        }

        elseif (empty($image) && (!empty($cover_photo))){

            $coverName = $cover_photo->getClientOriginalName();
            $destination = 'uploads';
            $cover_photo->move($destination, $coverName);
            $this->userRepository->noImageUpdate($id,$name,$coverName);
            return redirect()->back();


        }
            else{
                $this->userRepository->update($id,$name);
                return redirect()->back();
            }
    }

//    public function coverphoto(Request $request){
//        $cover_photo=Input::file('cover_photo');
//        $imageName = $cover_photo->getClientOriginalName();
//        $destination = 'uploads';
//        $cover_photo->move($destination, $imageName);
//        $this->userRepository->coverphoto($imageName);
//
//    }


}

