<?php

namespace App\Http\Controllers\social;

use App\Http\Requests\uploadPostRequest;
use App\status;
use App\statuscomment;
use App\statuslike;
use App\users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class SocialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home(){


        $post = status::get()->sortByDesc('id');
        $postforlast = status::all();
        $user =users::all();

        $comment = statuscomment::get();

        return view('social.home')->with('posts', $post)->with('comments', $comment)->with('users',$user)->with('postforlast',$postforlast);

    }

    public function uploadPost(uploadPostRequest $request)
    {

        if (Input::has('status-text')) {

            $text = input::get('status-text');
            $users_id = Auth::user()->id;
            $image = $request->file('image');


            if (!empty($image)) {
                $imageName = $image->getClientOriginalName();
                $destination = 'uploads';
                $image->move($destination, $imageName);
               status::create(['status_text' => $text, 'image' => $imageName, 'users_id' => $users_id]);

            } else {
                status::create(['status_text' => $text, 'users_id' => $users_id]);
//                DB::table('users_status')
                   //  ->insert(['status_text' => $text, 'users_id' => $users_id]);
            }

        }

        return redirect(route('home'));

    }


    public function index()
    {
        $status = status::all();

        foreach ($status as $status) {

            while ($status->users_id == Auth::user()->id) {

                $post = status::get()->where('users_id', $status->users_id)->sortByDesc('id');

                $comment = statuscomment::all();
                $postforlast = status::all();



                return view('social.social')->with('posts', $post)->with('comments', $comment)->with('postforlast',$postforlast);
            }

        }
        $post = "";
        return view('social.social')->with('posts', $post);
    }


    public function postComment()
    {

        $status = Input::get('comment-text');
        $user_id = Auth::user()->id;
        $status_id = Input::get('status_id');

        statuscomment::create(['comment_text' => $status, 'status_id' => $status_id, 'user_id' => $user_id,]);

        $status = status::all();
        $postforlast = status::all();



        foreach ($status as $status) {

            while ($status->users_id == Auth::user()->id) {

                $post = status::get()->where('users_id', $status->users_id)->sortByDesc('id');

                $comment = statuscomment::get();


                return Redirect::to('social')->with('posts', $post)->with('comments', $comment)->with('postforlast',$postforlast);
            }
        }

        $post = "";

        return view('social.social')->with('posts', $post);
    }



    public function homepostComment()
    {

        $status = Input::get('comment-text');
        $user_id = Auth::user()->id;
        $status_id = Input::get('status_id');

        statuscomment::create(['comment_text' => $status, 'status_id' => $status_id, 'user_id' => $user_id,]);

        $status = status::all();

        $postforlast = status::all();





        foreach ($status as $status) {


            $post = status::get()->where('users_id', $status->users_id)->sortByDesc('id');

            $comment = statuscomment::get();


            return Redirect::to('home')->with('posts', $post)->with('comments', $comment)->with('postforlast',$postforlast);
        }

    }


    public function like(){

        $status_id=Input::get('status_id');
        $likes = statuslike::create(['user_id'=>Auth::user()->id,'status_id'=>$status_id]);

        dd($likes);
//        return Redirect::to('home')->with('likes',$likes);

    }
}


