<?php

namespace App\Http\Controllers\social;

use App\Http\Requests\EditPostRequest;
use App\Http\Requests\uploadPostRequest;
use App\status;
use App\statuscomment;
use App\statuslike;
use App\User;
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

    public function index($id)
    {
        if (Auth::user()->id == $id) {

            $status = status::all();

            foreach ($status as $status) {

                while ($status->users_id == Auth::user()->id) {

                    $post = status::get()->where('users_id', $status->users_id)->sortByDesc('id');
                    $statuslike = statuslike::all();

                    $comment = statuscomment::all();
                    return view('social.social')->with('posts', $post)->with('comments', $comment)->with('statuslike', $statuslike);
                }

            }
            $post = "";
            return view('social.social')->with('posts', $post);
        } else {
            $status = status::all();

            foreach ($status as $status) {

                while ($status->users_id == $id) {

                    $post = status::get()->where('users_id', $status->users_id)->sortByDesc('id');
                    $comment = statuscomment::all();
                    $postforlast = status::all();
                    $guestuser = User::find($id);
                    $statuslike = statuslike::all();


                    return view('guest.guest')->with('posts', $post)->with('comments', $comment)->with('postforlast', $postforlast)->with('guestuser', $guestuser)->with('statuslike', $statuslike);
                }

            }


        }

    }

    public function timeline()
    {
        $status = status::all();

        foreach ($status as $status) {

            while ($status->users_id == Auth::user()->id) {

                $post = status::get()->where('users_id', $status->users_id)->sortByDesc('id');

                $comment = statuscomment::all();
                $statuslike = statuslike::all();

                return view('social.social')->with('posts', $post)->with('comments', $comment)->with('statuslike', $statuslike);
            }

        }
        $post = "";
        return view('social.social')->with('posts', $post);
    }

    public function home()
    {

        $post = status::get()->sortByDesc('id');
        $postforlast = status::all();
        $user = users::all();

        $comment = statuscomment::get();
        $statuslike = statuslike::all();


        return view('social.home')->with('posts', $post)->with('comments', $comment)->with('users', $user)->with('postforlast', $postforlast)->with('statuslike', $statuslike);

    }

    public function uploadPost(uploadPostRequest $request)
    {

        $text = input::get('status-text');
        $image = $request->file('image');

        if (!empty($text))  {

            $users_id = Auth::user()->id;
            $image = $request->file('image');

            if (!empty($image)) {
                $imageName = $image->getClientOriginalName();
                $destination = 'uploads';
                $image->move($destination, $imageName);
                status::create(['status_text' => $text, 'image' => $imageName, 'users_id' => $users_id]);

            } else {
                status::create(['status_text' => $text, 'users_id' => $users_id]);
            }
            return Redirect::to('timeline');

        } elseif(!empty($image)) {

            $users_id = Auth::user()->id;
            $imageName = $image->getClientOriginalName();
            $destination = 'uploads';
            $image->move($destination, $imageName);
            status::create(['image' => $imageName, 'users_id' => $users_id]);

            return redirect()->back();
        }
        else
            return redirect()->back();

    }

    public function uploadPosthome(uploadPostRequest $request)

    {
        $text = input::get('status-text');
        $image = $request->file('image');

        if (!empty($text)) {

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
            }
        }

            elseif(!empty($image)){

                $users_id = Auth::user()->id;
                $imageName = $image->getClientOriginalName();
                $destination = 'uploads';
                $image->move($destination, $imageName);
                status::create(['image' => $imageName, 'users_id' => $users_id]);
                return redirect()->back();
            }

        return redirect()->back();

    }

    public function editPost($id)
    {
        $status = status::find($id);
        return view('post/edit')->with('status', $status);

    }
    public function updatePost($data)
    {

        $data = explode(',', $data);
        $status_id = $data[0];
        $status_text = $data[1];
        status::where('id', $status_id)->update(['status_text' => $status_text,]);
        return redirect()->back();
    }

    public function deletePost($id)
    {

        status::where('id', '=', $id)->delete();
        return redirect()->back();

    }

}


