@extends('layout.app')
@section('content')

    <body id="guesttimeline">
    <div class="container space_from_nav">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    {!! Form::open(array('url' => 'social/newprofile','method' => 'post', 'files' =>'true')) !!}

                    <div class="form-group">
                        <label  class="col-sm-2 control-label font_color">Profile Picture</label>
                        <div class="col-sm-9  well well-lg container">
                            <div class="col-sm-3">
                                <img src="/uploads/{{ Auth::user()->image}}" style="width:150px; height:150px;">
                            </div>
                            <div class="col-sm-6">
                                <input type="file" id="image" name="image"style="padding-top:80px;" >
                             </div>
                        </div>

                        <input type="hidden" class="form-control"  name='id' value="{{ Auth::user()->id }}">

                        <div class="form-group">
                            <label  class="col-sm-2 control-label font_color">Cover Photo</label>
                            <div class="col-sm-9 well well-lg container">

                                @if(!empty( Auth::user()->cover_photo))
                                    <div class="col-sm-7">
                                        <img src="/uploads/{{ Auth::user()->cover_photo}}" style="width:400px;">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" id="cover_photo" name="cover_photo" style="padding-top:80px;">
                                    </div>
                                @else
                                    <div class="col-sm-7">
                                        <img src="/uploads/no-photo.png" style="width:400px;">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="file" id="cover_photo" name="cover_photo" style="padding-top:80px;">
                                    </div>

                                @endif
                                    <p class="text-danger">{{$errors->first('title')}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label font_color">Name</label>
                            <div class="col-sm-9 profilespace">
                                <input type="text" class="form-control" id="title" name='name' placeholder="Title" value="{{Auth::user()->name}}" required>
                                    <p class="text-danger">{{$errors->first('title')}}</p>
                                </div>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label font_color">Email</label>
                            <div class="col-sm-9 profilespace">
                                <input type='text' class="form-control" name="email" value="{{ Auth::user()->email }}" readonly="true"  style="cursor:no-drop">
                                <p class="text-danger">{{$errors->first('status')}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <input type="submit" name='submit' value='Update' class="btn btn-success">
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