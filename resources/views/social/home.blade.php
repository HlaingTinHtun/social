@extends('layout.app')
@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>



    <script>
        function voteAction(counter, status_id, action) {

            var datastring = counter + ',' + status_id + ',' + action;


            if(action == 'unlike') {

                var path = '/homeUnlike/'


            } else if ( action == 'like') {
                path = '/homelike/';


            }

            $.get(path + datastring, function (response) {
                console.log(response);
                $('#likes'+counter).html(response);

            });
        }


        function homecommentAction(counter, status_id) {

            var comment_text = $('input[name="comment-text' + counter + '"]').val();

            if (comment_text == "") {

                alert('Please Fill The Comment!');

            } else {


                var datastring = counter + ',' + status_id + ',' + comment_text;

                $('input[name="comment-text' + counter + '"]').val('');


                var path = '/homecomment/';
                $.get(path + datastring, function (response) {
                    console.log(response);
                    $('#comments' + counter).html(response);
                });

            }
        }

        function homecommentEnter(event,counter, status_id){

            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13') {


                var comment_text = $('input[name="comment-text' + counter + '"]').val();

                if (comment_text == "") {
                    alert('Please Fill The Comment!');
                } else {


                    var datastring = counter + ',' + status_id + ',' + comment_text;

                    var path = '/homecomment/';

                    $('input[name="comment-text' + counter + '"]').val('');


                    $.get(path + datastring, function (response) {
                        console.log(response);
                        $('#comments' + counter).html(response);


                    });
                }
            }


        }


    </script>



    <style>
            .namecolor{
                color:#1b6d85;
            }
            body {
                /*background-color:#1b6d85;*/
                background-color:#C9DAE1;
            }
        </style>
        <script>
            $(document).ready(function () {
                $('#search').click(function () {
                    var path = window.location.origin;
                    var keyword = $('input[name="keyword"]').val();
                    $.get(path + 'search' + keyword, function (data) {
//                        $(body).html(data);
                        alert(keyword);
                    })
                });
            });
            </script>


    <body>




        <div class="container">
            <div class="row">


                <div class="col-md-10 col-sm-offset-1">



                    {!! Form::open(array( 'files' =>'true')) !!}


                    <div class="panel panel-info">
                        <div class="panel-heading">Add a new status</div>
                        <div class="'panel-body">
                            <div class="form-group">
                                <label class="col-sm-offset-1">Write a new status</label>
                                <textarea  class="form-control"   name="status-text" id="status-text"></textarea>
                            </div>
                        </div>
                        <div class="panel-footer clearfix">
                            <input type="file" name="image" class="pull-left">
                            <button class="btn btn-info pull-right btn-sm"><i class="fa fa-plus"></i>Add status</button>
                        </div>
                    </div>


                    {!! Form::close()!!}
                    @foreach($posts as $key=>$status)
                        @foreach($users as $user)
                            @if($user->id == $status->users_id)
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6 "><B><a class="namecolor" href="/social/{{$user->id}}">{{ $user->name }}</a></B>    <i>{{ $status->created_at }}</i></div>
                                            <div class="col-md-1 col-md-offset-5">
                                                <li class="dropdown">
                                                    <a href="#" class="glyphicon glyphicon-list" data-toggle="dropdown"></a>
                                                    @if(Auth::user()->id == $status->users_id)

                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="/social/edit/{{$status->id}}" ><i class="glyphicon glyphicon-pencil"></i>Edit</a></li>
                                                            <li><a href="/social/delete/{{$status->id }}" ><i class="glyphicon glyphicon-trash"></i>Delete</a></li>
                                                        </ul>
                                                    @else
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="/social/guestuser/{{$user->id}}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                                                        </ul>
                                                    @endif
                                                </li>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <img src="/uploads/{{ $user->image }}" class="img-responsive">
                                            </div>

                                            <div class="col-md-11">
                                                <p>{{ $status->status_text }}</p>
                                                <?  $type =array('jpg','tif','png','gif','jpeg');
                                                $imageFileType = pathinfo($status->image,PATHINFO_EXTENSION);?>

                                                @if(in_array($imageFileType,$type))

                                                    <img src="/uploads/{{$status->image}}" width="150">
                                                    <div>
                                                        <a href="https://www.google.com/search?q={{$status->image}}&oq={{$status->image}}hrase&gws_rd=ssl">View Related Source</a></Strong>
                                                    </div>
                                                @elseif($imageFileType =='mp3')
                                                    <audio controls>
                                                        <source src="/uploads/{{$status->image}}" type="audio/ogg">
                                                    </audio>
                                                    <a href="https://www.google.com/search?q={{$status->image}}&oq={{$status->image}}hrase&gws_rd=ssl">View Related Source</a>


                                                @elseif($imageFileType =='mp4')
                                                    <video width="320" height="240" controls>
                                                        <source src="/uploads/{{$status->image}}" type="video/mp4">
                                                    </video>
                                                    <a href="https://www.google.com/search?q={{$status->image}}&oq={{$status->image}}hrase&gws_rd=ssl">View Related Source</a>
                                                @else
                                                    {{ $status->image}}
                                                @endif
                                            </div>




                                            <div class="col-md-12">

                                                <hr>


                                            <ul class="list-unstyled list-inline">
                                                <li>
                                                    <button class="btn btn-xs btn-info" type="button" data-toggle="modal" data-target="#view-comments-{{ $status->id }}" aria-expanded="false" aria-controls="view-comments-{{ $status->id }}"><i class="fa fa-comments-o"></i>View & Comment</button>

                                                    <div class="modal fade" id="view-comments-{{ $status->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title " id="myModalLabel">Comments</h4>
                                                                </div>
                                                                <div id="comments<?=$key;?>">
                                                                    @foreach($comments as $comment)
                                                                        @if($comment->status_id == $status->id )
                                                                            <div class="row">
                                                                                <div class="col-md-1">
                                                                                    <img src="/uploads/{{ App\User::find($comment->user_id)->image }}"
                                                                                         class="img-responsive">
                                                                                </div>
                                                                                <div class="col-md-11">
                                                                                    <ul class="list-inline list-unstyled">
                                                                                        <b><h5><a class='namecolor'
                                                                                                  href="/social/{{$comment->user_id}}">{{ App\User::find($comment->user_id)->name }}</a></h5></b>
                                                                                        {{ $comment->comment_text }}
                                                                                        <div>
                                                                                            @if($comment->user_id == Auth::user()->id )
                                                                                                <b><a style="color:red;" href="/comment/edit/{{$comment->id}}">edit</a>|
                                                                                                    <a style="color:red;" href="/comment/delete/{{$comment->id}}" onclick="return confirm('Are u Sure?')">delete</a></b>
                                                                                            @else
                                                                                            @endif
                                                                                        </div>
                                                                                        <hr>

                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                                <input type="hidden" name='status_id' value={{ $status->id }}>
                                                                <input type="hidden" name='commentuserid' value="{{ App\User::find($status->id) }}">

                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="comment-text<?=$key;?>" onkeypress="homecommentEnter(event,'<?= $key;?>','<?= $status->id;?>')" id="comment_text"
                                                                               placeholder="Post a comment...">
                                                                            <span class="input-group-btn">
                                                                                <button class="btn btn-default" type="submit" id="hide" onclick="homecommentAction('<?= $key;?>','<?= $status->id;?>')"  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-send"></i></button>
                                                                            </span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li id="likes<?=$key;?>">

                                                    @if(App\statuslike::where(['status_id'=>$status->id,'user_id'=>Auth::user()->id])->first())

                                                        <input type="hidden" name='status_id' id="status_id" value={{ $status->id }}>
                                                        <input type="hidden" name="counter" id="counter" value="{{ $key }}">
                                                        <button class="unlike btn btn-info btn-xs " type="submit" onclick="voteAction('<?= $key;?>','<?= $status->id;?>','unlike')">UnLike</button>

                                                    @else

                                                        <input type="hidden" name='status_id' id="like_status_id" value={{ $status->id }}>
                                                        <input type="hidden" name="counter" id="counter" value="{{ $key }}">
                                                        <button class="like btn btn-info btn-xs "  type="submit" onclick="voteAction('<?= $key;?>','<?= $status->id;?>','like')">Like</button>

                                                    @endif

                                                </li>

                                                <? $count = 0;?>
                                                @foreach($comments as $comment)
                                                    @if($comment->status_id == $status->id )
                                                        <?  $count += 1;?>
                                                    @endif
                                                @endforeach
                                                <? echo $count." "."Comments"?>



                                            </ul>


                                                <?php
                                                $arr = [];
                                                $key = 0;

                                                foreach($comments as $comment){
                                                    if($comment->status_id == $status->id){
                                                        $arr[$key] = [
                                                                'uid' => $comment->user_id,
                                                                'cmt' => $comment->comment_text
                                                        ];
                                                        //echo "<pre>";print_r($arr); echo "</pre>";
                                                        $key++;

                                                    }
                                                }
                                                $array = end($arr);
                                                $user_id =  $array['uid'];
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <?php if(!empty(App\User::find($user_id))){
                                                            $image = App\User::find($user_id)->image;
                                                            $name = App\User::find($user_id)->name;
                                                        }else{
                                                            $image = '';$name = '';}?>
                                                        @if(!empty($image))
                                                                <img src="/uploads/{{ $image }}" class="img-responsive">@else
                                                            @endif
                                                     </div>
                                                    <div class="col-md-11">
                                                        <ul class="list-inline list-unstyled">
                                                            <li><B><a class='namecolor' href="/social/{{$user_id}}">{{ $name }}</a></B></li>
                                                            <li>{{ $array['cmt'] }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </body>
@endsection
