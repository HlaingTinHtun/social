@extends('layout.app')
@section('content')

    <body id="postedit">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    {!! Form::open(array('url' => '/updatepost','method' => 'post', 'files' =>'true')) !!}
                        <div class="form-group">
                                <input type="hidden" class="form-control"  name='id' value="{{$status->id }}">
                                <label  class="col-sm-3 control-label font_color">Status</label>
                                <div class="col-sm-9 editspace">
                                    <textarea class="form-control" id="status_text" name='status_text'>{{ $status->status_text }}</textarea>
                                    <p class="text-danger">{{$errors->first('status_text')}}</p>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label  class="col-sm-3 control-label font_color">Image/Music/Video</label>
                                <div class="col-sm-9 well well-lg  container">
                                    <?  $type =array('jpg','tif','png','gif','jpeg');
                                        $imageFileType = pathinfo($status->image,PATHINFO_EXTENSION);?>

                                        @if(in_array($imageFileType,$type))
                                            <div class="col-sm-6 ">
                                                <img src="/uploads/{{$status->image}}" width="150">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="file"  id="image" name='image' value="{{ $status->image }}">
                                            </div>


                                        @elseif($imageFileType =='mp3')
                                            <div class="col-sm-6 ">
                                                <audio controls>
                                                    <source src="/uploads/{{$status->image}}" type="audio/ogg">
                                                </audio>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="file"  id="image" name='image' value="{{ $status->image }}" style="padding-top:80px;">
                                            </div>

                                        @elseif($imageFileType =='mp4')
                                            <div class="col-sm-6 ">
                                                <video width="300" height="240" controls>
                                                    <source src="/uploads/{{$status->image}}" type="video/mp4">
                                                </video>
                                            </div>
                                            <div class="col-sm-2 ">
                                                <input type="file"  id="image" name='image' value="{{ $status->image }}" style="padding-top:80px;">
                                            </div>

                                        @else
                                            <input type="file"  id="image" name='image' value="{{ $status->image }}">
                                        @endif
                                    </div>
                                </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <input type="submit" name='submit'  value='Update' class="btn btn-success">
                                    <input type="reset" name='reset' value='Cancel' class="btn btn-default">
                                </div>
                            </div>
                        </div>
                    {!! form::close() !!}
                </div>
            </div>
        </div>
    </div>
</body>

@endsection