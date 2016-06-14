<?php

namespace App\Http\Controllers\social;

use App\Http\Requests\uploadPostRequest;
use App\status;
use App\statuscomment;
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
        $user =users::all();

        $comment = statuscomment::select('id', 'comment_text', 'status-id as statusid', 'user_id', 'created_at', 'updated_at')->get();


        return view('social.home')->with('posts', $post)->with('comments', $comment)->with('users',$user);

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

                $comment = statuscomment::select('id', 'comment_text', 'status-id as statusid', 'user_id', 'created_at', 'updated_at')->get();

                return view('social.social')->with('posts', $post)->with('comments', $comment);
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

        statuscomment::create(['comment_text' => $status, 'status-id' => $status_id, 'user_id' => $user_id,]);

        $status = status::all();

        foreach ($status as $status) {

            while ($status->users_id == Auth::user()->id) {

                $post = status::get()->where('users_id', $status->users_id)->sortByDesc('id');

                $comment = statuscomment::select('id', 'comment_text', 'status-id as statusid', 'user_id', 'created_at', 'updated_at')->get();

                return Redirect::to('social')->with('posts', $post)->with('comments', $comment);
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

        statuscomment::create(['comment_text' => $status, 'status-id' => $status_id, 'user_id' => $user_id,]);

        $status = status::all();

        foreach ($status as $status) {

//            while ($status->users_id == Auth::user()->id) {

                $post = status::get()->where('users_id', $status->users_id)->sortByDesc('id');

                $comment = statuscomment::select('id', 'comment_text', 'status-id as statusid', 'user_id', 'created_at', 'updated_at')->get();

                $last =statuscomment::orderBy('id', 'desc')->first();


            return Redirect::to('home')->with('posts', $post)->with('comments', $comment)->with('last',$last);
//            }
        }

//        $post = "";
//
//        return view('social.home')->with('posts', $post);
    }
}


