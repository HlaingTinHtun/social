@extends('layout.app')
@section('content')
    <style>

        body {
            background-color:#1b6d85;
        }
    </style>



<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    {!! Form::open(array('url' => '/updatepost','method' => 'post', 'files' =>'true')) !!}


                            <div class="form-group">
                                <input type="hidden" class="form-control"  name='id' value="{{$status->id }}">
                                <label  class="col-sm-2 control-label ">Status</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="status_text" name='status_text'>{{ $status->status_text }}</textarea>
                                    <p class="text-danger">{{$errors->first('status_text')}}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-sm-2 control-label ">Image/Music/Video</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="image" name='image' value="{{ $status->image }}">
                                </div>
                            </div>

                                <div class="form-group">
                                    <div class="col-sm-10 col-md-offset-2">


                                    <?  $type =array('jpg','tif','png','gif','jpeg');
                                        $imageFileType = pathinfo($status->image,PATHINFO_EXTENSION);?>

                                        @if(in_array($imageFileType,$type))


                                            <img src="/uploads/{{$status->image}}" width="150">

                                        @elseif($imageFileType =='mp3')
                                            <audio controls>
                                                <source src="/uploads/{{$status->image}}" type="audio/ogg">
                                            </audio>


                                        @elseif($imageFileType =='mp4')
                                            <video width="320" height="240" controls>
                                                <source src="/uploads/{{$status->image}}" type="video/mp4">
                                            </video>
                                        @else
                                            {{ $status->image}}
                                        @endif
                                    </div>

                            </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
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