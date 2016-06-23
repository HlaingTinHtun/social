<?php

namespace App\Http\Controllers\social;

use App\status;
use App\statuscomment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function postComment()
    {

        $status = Input::get('comment-text');
        $user_id = Auth::user()->id;

        $status_id = Input::get('status_id');

        statuscomment::create(['comment_text' => $status, 'status_id' => $status_id, 'user_id' => $user_id,]);

        $status = status::all();


        foreach ($status as $status) {

            while ($status->users_id == Auth::user()->id) {

                return redirect()->back();
            }
        }

        return redirect()->back();
    }



    public function homepostComment()
    {

        $status = Input::get('comment-text');
        $user_id = Auth::user()->id;
        $status_id = Input::get('status_id');

        statuscomment::create(['comment_text' => $status, 'status_id' => $status_id, 'user_id' => $user_id,]);

        return redirect()->back();



    }

}
