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

    /**
     * @param $datastring
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * This function is to write the comment in status
     */
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

    /**
     * @param $data
     * @return mixed
     * This function is to update the comment
     */

    public function update($data)
    {
        $data=explode(',',$data);
        $comment_id = $data[0];
        $comment_text = $data[1];
        statuscomment::where('id',$comment_id)->update(['comment_text'=>$comment_text]);
        return redirect()->back();
    }

    /**
     * @param $id
     * @return mixed
     * This function is to delete the comment.
     */

    public function delete($id)
    {
        statuscomment::where('id','=',$id)->delete();
        return redirect()->back();

    }

}
