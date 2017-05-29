

            <div id="comments<?=$key;?>">
                @foreach(\App\statuscomment::all() as $comment)
                    @if($comment->status_id == $status_id )
                        <div class="row">
                            <div class="col-md-1">
                                <img src="/uploads/{{ App\User::find($comment->user_id)->image }}" class="img-responsive">
                            </div>
                            <div class="col-md-11">
                                <ul class="list-inline list-unstyled">
                                    <b><h5><a href="/social/{{$comment->user_id}}">{{ App\User::find($comment->user_id)->name }}</a></h5></b>
                                    <div>{{ $comment->comment_text }}</div><i style="color:#003366;">{{ $comment->created_at }}</i>
                                    <div>
                                        @if($comment->user_id == Auth::user()->id )
                                            <b><a  style="color:red;" onclick="commentEdit('<?=$comment->id;?>','{{\App\statuscomment::find($comment->id)->comment_text}}')">Edit</a>|
                                                <a style="color:red;" onclick="commentDelete('<?=$comment->id;?>')">delete</a></b>
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











