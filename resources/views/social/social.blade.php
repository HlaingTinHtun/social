@extends('layout.app')
@section('content')

    <body id="social">
    <div class="container space_from_nav">
        <div class="row">
            <div class="col-md-10 col-sm-offset-1">
                {!! Form::open(array('files' =>'true')) !!}
                <div class="coverphoto">
                    @if(!empty( Auth::user()->cover_photo))
                        <img   class="fadding-photo"src='/uploads/{{ Auth::user()->cover_photo }}' width="100%" height="400" >
                    @elseif (!empty($guestuser->cover_photo))
                        <img  class="fadding-photo" src='uploads/{{ $guestuser->cover_photo }}' width="100%" height="400">

                    @else
                        <img  src='/uploads/no-photo.png' width="100%" height="400px">
                    @endif

                </div>
                <div class="panel panel-info">
                    <div class="panel-heading " id="panel_heading"><b class="namecolor">Add a new status</b></div>
                    <div class="'panel-body">
                        <div class="form-group">
                            <label class="col-sm-offset-1">Write a new status</label>
                            <textarea class="form-control" name="status-text" id="status-text"></textarea>
                        </div>
                    </div>
                    <div class="panel-footer clearfix" id="panel_footer">
                        <input type="file" name="image" class="pull-left namecolor">
                        <button class="btn btn-info pull-right btn-sm" id="comment_btn"><i class="fa fa-plus"></i>Add status</button>
                    </div>
                </div>
                {!! Form::close()!!}

                @if(!empty($posts))
                    @foreach($posts as $key=>$status)
                        <div class="panel panel-info">
                            <div class="panel-heading" id="panel_heading">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <B><a class="namecolor" href="social/{{Auth::user()->id}}">{{ Auth::user()->name }}</a></B>
                                        <i class="namecolor"> {{ $status->created_at }}</i>
                                    </div>
                                    <div class="col-md-1 col-md-offset-5">
                                        <li class="dropdown">
                                            <a href="#" class="glyphicon glyphicon-list namecolor" data-toggle="dropdown"></a>
                                            @if(Auth::user()->id == $status->users_id)

                                                <ul class="dropdown-menu" role="menu">
                                                    <input type="hidden" name="{{\App\status::find($status->id)}}">
                                                    <li><a onclick="postEdit('<?=$status->id;?>','{{\App\status::find($status->id)->status_text}}')">
                                                            <span class="glyphicon glyphicon-pencil"></span>Edit</a>
                                                    </li>
                                                    <li><a onclick="postDelete('<?=$status->id;?>')">
                                                            <span class="glyphicon glyphicon-trash"></span>Delete</a>
                                                    </li>
                                                </ul>
                                            @else
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="/social/guestuser/{{$status->users_id}}">
                                                            <span class="glyphicon glyphicon-user"></span>Profile</a>
                                                    </li>
                                                </ul>
                                            @endif
                                        </li>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-body font_color" id="panel_body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="/uploads/{{ Auth::user()->image }}" class="img-responsive">
                                    </div>
                                    <div class="col-md-11">

                                        <? $all_text = strlen($status->status_text); ?>

                                        @if($all_text > 500)
                                            <div>
                                                <? $text = substr($status->status_text,0,400);
                                                echo $text;?>
                                                    <a id="more{{$key}}"   onClick="toggleText({{$key}});">Read More........</a>

                                            </div>
                                                <div id="more-text{{$key}}" class="more-text">
                                                    <? $texts = substr($status->status_text,400,$all_text);
                                                    echo $texts;?>
                                                </div>
                                        @else
                                                <p>{{ $status->status_text }}</p>
                                         @endif

                                            <?  $type = array('jpg', 'tif', 'png', 'gif', 'jpeg');
                                                $imageFileType = pathinfo($status->image, PATHINFO_EXTENSION);?>

                                        @if(in_array($imageFileType,$type))

                                            <img src="/uploads/{{$status->image}}" width="150">

                                        @elseif($imageFileType =='mp3')
                                            <audio controls>
                                                <source src="/uploads/{{$status->image}}" type="audio/ogg">
                                            </audio>
                                            <div><h5><i><a  href="https://www.google.com/search?q={{$status->image}}&oq={{$status->image}}hrase&gws_rd=ssl">View
                                                            Related Source</a></i></h5></div>


                                        @elseif($imageFileType =='mp4')
                                            <video width="320" height="240" controls>
                                                <source src="/uploads/{{$status->image}}" type="video/mp4">
                                            </video>

                                            <div><h5><i><a  href="https://www.google.com/search?q={{$status->image}}&oq={{$status->image}}hrase&gws_rd=ssl">
                                                            View Related Source</a></i></h5></div>
                                        @else
                                            {{ $status->image}}
                                        @endif

                                    </div>
                                    <div class="col-md-12">
                                        <hr>

                                        <ul class="list-unstyled list-inline " >

                                            <li>
                                                <button class="btn btn-xs btn-info" id="comment_btn" type="button" data-toggle="modal"
                                                        data-target="#view-comments-{{ $status->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="view-comments-{{ $status->id }}">View & Comment
                                                </button>

                                                <div class="modal fade" id="view-comments-{{ $status->id }}"
                                                     tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">

                                                            <div class="modal-header" >
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title" id="myModalLabel" >Comments</h4>
                                                            </div>

                                                            <div id="comments<?=$key;?>">
                                                                @foreach($comments as $comment)
                                                                    @if($comment->status_id == $status->id )
                                                                        {{--<div class="container" id="panel_body">--}}
                                                                        <div class="row" >
                                                                            <div class="col-md-1" >
                                                                                <img src="/uploads/{{ App\User::find($comment->user_id)->image }}"
                                                                                     class="img-responsive">
                                                                            </div>
                                                                            <div class="col-md-10" >
                                                                                <ul class="list-inline list-unstyled">
                                                                                    <b><h5><a href="/social/{{$comment->user_id}}">{{ App\User::find($comment->user_id)->name }}</a></h5></b>
                                                                                    <div>
                                                                                        <p>{{ $comment->comment_text }}</p>
                                                                                    </div>

                                                                                    <i style="color:#003366;">{{ $comment->created_at }}</i>
                                                                                    <div>
                                                                                        @if($comment->user_id == Auth::user()->id )
                                                                                            <a  style="color:red;" onclick="commentEdit('<?=$comment->id;?>','{{\App\statuscomment::find($comment->id)->comment_text}}')">Edit</a>|
                                                                                            <a style="color:red;"  onclick="commentDelete('<?=$comment->id;?>')">delete</a></b>
                                                                                        @else
                                                                                                <div class='font_color'>{{ $comment->comment_text }}</div>
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
                                                                    <textarea class="form-control" name="comment-text<?=$key;?>" onkeypress="commentEnter(event,'<?= $key;?>','<?= $status->id;?>')" id="comment_text" placeholder="Post a comment..."></textarea>
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default" type="submit" id="hide" onclick="commentAction('<?= $key;?>','<?= $status->id;?>')"  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-send"></i></button>
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
                                                    <button class="unlike btn btn-info btn-xs"  id="comment_btn" type="submit" onclick="likeAction('<?= $key;?>','<?= $status->id;?>','unlike')">UnLike</button>

                                                @else

                                                    <input type="hidden" name='status_id' id="like_status_id" value={{ $status->id }}>
                                                    <input type="hidden" name="counter" id="counter" value="{{ $key }}">
                                                    <button class="like btn btn-info btn-xs"  id="comment_btn" type="submit" onclick="likeAction('<?= $key;?>','<?= $status->id;?>','like')">Like</button>

                                                @endif

                                                <? $count = 0;?>
                                                @foreach($statuslike as $like)
                                                    @if($like->status_id == $status->id )
                                                        <?  $count += 1;?>
                                                    @endif
                                                @endforeach
                                                <? echo $count . " " . "like(s)"?>

                                            </li>
                                            <? $count = 0;?>
                                            @foreach($comments as $comment)
                                                @if($comment->status_id == $status->id )
                                                    <?  $count += 1;?>
                                                @endif
                                            @endforeach
                                            <? echo $count . " " . "Comment(s)"?>

                                        </ul>
                                        <?php
                                        $arr = [];
                                        $key = 0;

                                        foreach ($comments as $comment) {
                                            if ($comment->status_id == $status->id) {
                                                $arr[$key] = [
                                                        'uid' => $comment->user_id,
                                                        'cmt' => $comment->comment_text
                                                ];
                                                $key++;
                                            }
                                        }
                                        $array = end($arr);
                                        $user_id = $array['uid'];
                                        ?>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <?php if (!empty(App\User::find($user_id))) {
                                                    $image = App\User::find($user_id)->image;
                                                    $name = App\User::find($user_id)->name;
                                                } else {
                                                    $image = '';
                                                    $name = '';
                                                }?>
                                                @if(!empty($image))
                                                    <img src="/uploads/{{ $image }}" class="img-responsive">
                                                @else
                                                @endif
                                            </div>
                                            <div class="col-md-11" >
                                                <ul class="list-inline list-unstyled" >
                                                    <li><b><a class="namecolor"
                                                              href="/social/{{$user_id}}">{{ $name }}</a></b></li>
                                                    <li>
                                                        <? $all_text = strlen($array['cmt']); ?>

                                                        @if($all_text > 500)
                                                            <? $text = substr($array['cmt'],0,200);
                                                            echo $text;?>
                                                            <div id="more-text{{$key}}" class="more-text">
                                                                <? $texts = substr($array['cmt'],200,$all_text);
                                                                echo $texts;?>
                                                            </div>
                                                            <a id="more{{$key}}"   onClick="toggleText({{$key}});">Read More........</a>
                                                        @else
                                                            <p>{{ $array['cmt'] }}</p>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer clearfix" id="panel_footer"></div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </body>
@endsection
