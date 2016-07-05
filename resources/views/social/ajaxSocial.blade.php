

@if(App\statuslike::where(['status_id'=>$status_id,'user_id'=>Auth::user()->id])->first())
    {{--{!! Form::open(array('url' => 'timelineUnlike','method' => 'get')) !!}--}}
    {{--{!! Form::open() !!}--}}

    <input type="hidden" name='status_id' id="status_id" value={{ $status_id }}>


    <input type="hidden" name="counter" id="counter" value="{{ $key }}">
    <button class="unlike btn btn-info btn-xs" type="submit" onclick="voteAction('<?= $key;?>','<?= $status_id;?>','unlike')">UnLike</button>

    {{--{!! Form::close() !!}--}}

@else
    {{--{!! Form::open(array('url' => 'timelinelike','method' => 'get')) !!}--}}
    {{--{!! Form::open() !!}--}}

    <input type="hidden" name='status_id' id="like_status_id" value={{ $status_id  }}>
    <input type="hidden" name="counter" id="counter" value="{{ $key }}">

    <button class="like btn btn-info btn-xs" type="submit" onclick="voteAction('<?= $key;?>','<?= $status_id;?>','like')">Like</button>


    {{--{!! Form::close() !!}--}}
@endif


<? $count = 0;?>
@foreach(\App\statuslike::all() as $like)
    @if($like->status_id == $status_id )
        <?  $count += 1;?>
    @endif
@endforeach
<? echo $count . " " . "likes"?>