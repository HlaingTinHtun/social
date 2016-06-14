@extends('layout.app')
@section('content')

    <script>
        function comment(){
            window.location.href='homecomment';
        }
    </script>


    <body class="bgcolor">
        <div class="container ">
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
                    @foreach($posts as $status)
                        @foreach($users as $user)
                            @if($user->id == $status->users_id)
                                {{--{{ dd($status->id) }}--}}

                                <div class="panel panel-info">
                                    <div class="panel-heading">{{ $user->name }} {{ $status->created_at }}</div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <img src="/uploads/{{ $user->image }}" class="img-responsive">
                                            </div>

                                            <div class="col-md-11">
                                                <p>{{ $status->status_text }}</p>
                                                <?  $type =array('jpg','tif','png','gif');
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
                                                                <div class="modal-body">
                                                                    @foreach($comments as $comment)
                                                                        @if($comment->statusid == $status->id )
                                                                             @if($user->id == $comment->user_id)
                                                                                <div class="row">
                                                                                    <div class="col-md-1">
                                                                                        <img src="/uploads/{{ $user->image }}" class="img-responsive">
                                                                                    </div>
                                                                                    <div class="col-md-11">
                                                                                        <p> {{ $comment->comment_text }}</p>
                                                                                    </div>
                                                                                </div>
                                                                             @else
                                                                                <div class="row">
                                                                                    <div class="col-md-1">
                                                                                        <img src="/uploads/{{ Auth::user()->image}}" class="img-responsive">
                                                                                    </div>
                                                                                    <div class="col-md-11">
                                                                                        <p> {{ $comment->comment_text }}</p>
                                                                                    </div>
                                                                                </div>
                                                                             @endif
                                                                        @endif
                                                                    @endforeach
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    {!! Form::open() !!}
                                                    <input type="hidden" name='status_id' value={{ $status->id }}>

                                                    <button class="btn btn-info btn-xs " type="button"  ><i class="fa fa-thumbs-up"></i>Like</button>

                                                    {!! Form::close() !!}
                                                </li>
                                            </ul>
                                                @foreach($comments as $comment)
                                                    @if($comment->statusid == $status->id )
                                                        @if($user->id == $comment->user_id)
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <img src="/uploads/{{ $user->image }}" class="img-responsive">
                                                                </div>
                                                                <div class="col-md-11">
                                                                    <p> {{ $comment->comment_text }}</p>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <img src="/uploads/{{ Auth::user()->image}}" class="img-responsive">
                                                                </div>
                                                                <div class="col-md-11">
                                                                    <p> {{ $comment->comment_text }}</p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach

                                            </div>

                                        </div>
                                    </div>

                                    <div class="panel-footer clearfix">
                                        {!! Form::open(array('url' => 'homecomment','method' => 'post')) !!}
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
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </body>
@endsection
