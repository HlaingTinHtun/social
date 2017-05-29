
@if(App\statuslike::where(['status_id'=>$status_id,'user_id'=>Auth::user()->id])->first())


    <input type="hidden" name='status_id' id="status_id" value={{ $status_id }}>
    <input type="hidden" name="counter" id="counter" value="{{ $key }}">
    <button class="unlike btn btn-info btn-xs" id="comment_btn" type="submit" onclick="likeAction('<?= $key;?>','<?= $status_id;?>','unlike')">UnLike</button>

@else
    <input type="hidden" name='status_id' id="like_status_id" value={{ $status_id  }}>
    <input type="hidden" name="counter" id="counter" value="{{ $key }}">

    <button class="like btn btn-info btn-xs"  id="comment_btn" type="submit" onclick="likeAction('<?= $key;?>','<?= $status_id;?>','like')">Like</button>


@endif

<?php $count = 0;?>
@foreach(\App\statuslike::all() as $like)
    @if($like->status_id == $status_id )
        <?php  $count += 1;?>
    @endif
@endforeach
<?php echo $count . " " . "like(s)"?>