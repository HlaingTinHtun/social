@extends('layout.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

    <style>

        body {
            background-color:#ce8483;
        }
    </style>



    <script>
    function voteAction(counter, status_id, action) {

    var datastring = counter + ',' + status_id + ',' + action;


    if(action == 'unlike') {

    var path = '/guestUnlike/'


    } else if ( action == 'like') {
    path = '/guestlike/';


    }

    $.get(path + datastring, function (response) {
    console.log(response);
    $('#likes'+counter).html(response);

    });
    }
    </script>

    <body>
    <div class="container ">
        <div class="row">

            <div class="col-md-10 col-sm-offset-1">
                @if(!empty($guestuser->cover_photo))
                   <img src ='/uploads/{{ $guestuser->cover_photo }}' width="100%" height="400px">
                @else
                    <img src ='/uploads/no-photo.png' width="100%" height="400px">

                @endif

                    @foreach($posts as $key=>$status)
                        <div class="panel panel-danger">
                            <div class="panel-heading">


                                <div class="row">
                                    <div class="col-md-6 ">{{ $guestuser->name }}{{ $status->created_at }}</div>
                                    <div class="col-md-1 col-md-offset-5">
                                        <li class="dropdown">
                                            <a href="#" class="glyphicon glyphicon-list" data-toggle="dropdown"></a>

                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="/social/guestuser/{{$status->users_id}}" ><i class="fa fa-btn fa-user"></i>Profile</a></li>
                                                </ul>
                                        </li>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/uploads/{{ Auth::user()->image }}" class="img-responsive">
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
                                                                <h4 class="modal-title " id="myModalLabel" >Comments</h4>
                                                            </div>
                                                            @foreach($comments as $comment)
                                                                @if($comment->status_id == $status->id )
                                                                    <div class="row">
                                                                        <div class="col-md-1">
                                                                            <img src="/uploads/{{ App\User::find($comment->user_id)->image }}" class="img-responsive">
                                                                        </div>
                                                                        <div class="col-md-11">
                                                                            <ul class="list-inline list-unstyled">
                                                                                <li><a href="/social/{{$comment->user_id}}">{{ App\User::find($comment->user_id)->name }}</a></li>
                                                                                <li>{{ $comment->comment_text }}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

                                                    <button class="like btn btn-info btn-xs "   type="submit" onclick="voteAction('<?= $key;?>','<?= $status->id;?>','like')">Like</button>

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
                                                    <img src="/uploads/{{ $image }}" class="img-responsive">
                                                @else
                                                @endif
                                            </div>
                                            <div class="col-md-11">
                                                <ul class="list-inline list-unstyled">
                                                    <li><a href="/social/{{$user_id}}">{{ $name }}</a></li>
                                                    <li>{{ $array['cmt'] }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="panel-footer clearfix">

                                {!! Form::open(array('url' => 'comment','method' => 'post')) !!}

                                <input type="hidden" name='status_id' value={{ $status->id }}>

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="comment-text" id="comment_text" placeholder="Post a comment...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit" onclick="comment();" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-send"></i></button>
                                        </span>
                                    </div>
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
    </body>

@endsection
