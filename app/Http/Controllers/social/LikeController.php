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


    public function postLike($datastring)
    {
        $data=explode(',',$datastring);
        $key = $data[0];
        $status_id = $data[1];
        statuslike::create(['user_id' => Auth::user()->id, 'status_id' => $status_id]);
        return view('social.ajaxSocial',compact('key', 'status_id'));

    }

    public function postUnlike($datastring){

        $data=explode(',',$datastring);
        $key = $data[0];
        $status_id = $data[1];

        statuslike::where('status_id',$status_id)->Where('user_id',Auth::user()->id)->delete();
        return view('social.ajaxSocial',compact('key','status_id'));

    }


}
