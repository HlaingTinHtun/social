<?php

namespace App\Http\Controllers\social;

use App\status;
use App\statuslike;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class LikeController extends Controller
{
    public function postLike(Request $request)
    {
        $status_id = Input::get('status_id');
        statuslike::create(['user_id' => Auth::user()->id, 'status_id' => $status_id]);
        return redirect()->back();

    }

    public function homepostLike(Request $request)
    {
        $status_id = Input::get('status_id');
        statuslike::create(['user_id' => Auth::user()->id, 'status_id' => $status_id]);
        return redirect()->back();
    }

    public function postUnlike(){
        $status_id = Input::get('status_id');
        statuslike::where('status_id',$status_id)->Where('user_id',Auth::user()->id)->delete();
        return redirect()->back();

    }


}
