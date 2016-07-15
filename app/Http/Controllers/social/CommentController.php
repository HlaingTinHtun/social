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
    public function postComment($datastring)

    {

        $data=explode(',',$datastring);
        $key = $data[0];
        $status_id = $data[1];
        $comment_text = $data[2];
        $user_id = Auth::user()->id;
        statuscomment::create(['comment_text' => $comment_text, 'status_id' => $status_id, 'user_id' => $user_id,]);
        return view('social.ajaxCommentSocial',compact('key','status_id'));

    }


//    public function edit($id){
//        $comment = statuscomment::find($id);
//        return view('social.editcomment',compact('comment'));
//    }

    public function update($data){

        $data=explode(',',$data);
        $comment_id = $data[0];
        $comment_text = $data[1];

        statuscomment::where('id',$comment_id)->update(['comment_text'=>$comment_text]);
        return redirect()->back();


//        return view('social.ajaxEditCommentSocial',compact('comment_id'));

    }

    public function delete($id){
        statuscomment::where('id','=',$id)->delete();
        return redirect()->back();

    }

}
