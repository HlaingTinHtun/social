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

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $userRepository
     * @param checkemail $check
     */
    public function __construct(UserRepositoryInterface $userRepository,checkemail $check)
    {
        $this->check =$check;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('common/profile');
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * This function is to check the other person's profile
     */

    public function guestprofile($id)
    {
        if(Auth::user()->id == $id) {
            return view('common/profile');
        }else {
            $guest  = user::find($id);
            return view('common/guest')->with('guest',$guest);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * This function is to register the user
     */

    public function register()
    {
        return view('auth.register');
    }

    /**
     * @param UserRequest $request
     * @return mixed
     * This function is to create the user
     */

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
        return Redirect::to('login');
        }


    /**
     * @param UpdateUserRequest $request
     * @return string
     *
     * This function is to update the user information
     */
    public function update(UpdateUserRequest $request)
    {
        $id =Input::get('id');
        $name =Input::get('name');
        $image =Input::file('image');
        $cover_photo=Input::file('cover_photo');

        if(!empty($image) && (!empty($cover_photo)))
        {
            $coverName = $cover_photo->getClientOriginalName();
            $destination = 'uploads';
            $cover_photo->move($destination, $coverName);
            $imageName = $image->getClientOriginalName();
            $destination = 'uploads';
            $image->move($destination, $imageName);
            $this->userRepository->allupdate($id,$name, $imageName,$coverName);

            return redirect()->back();

        } elseif(!empty($image) && (empty($cover_photo)))
        {
            $imageName = $image->getClientOriginalName();
            $destination = 'uploads';
            $image->move($destination, $imageName);
            $this->userRepository->noCoverUpdate($id,$name, $imageName);
            return redirect()->back();

        } elseif (empty($image) && (!empty($cover_photo)))
        {
            $coverName = $cover_photo->getClientOriginalName();
            $destination = 'uploads';
            $cover_photo->move($destination, $coverName);
            $this->userRepository->noImageUpdate($id,$name,$coverName);
            return redirect()->back();

        } else {
                $this->userRepository->update($id,$name);
                return redirect()->back();
            }
    }
}

