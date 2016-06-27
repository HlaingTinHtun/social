@extends('layout.app')
@section('content')



    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    {!! Form::open(array('url' => 'social/newprofile','method' => 'post', 'files' =>'true')) !!}
                        <div class="col-md-4">
                            <img src="/uploads/{{ Auth::user()->image}}" style="width:150px; height:150px;">
                            <input type="file" id="image" name="image">
                        </div>

                        <div class="col-md-8">

                            <input type="hidden" class="form-control"  name='id' value="{{ Auth::user()->id }}">


                            <div class="form-group">
                                <label  class="col-sm-3 control-label ">Cover Photo</label>
                                <div class="col-sm-9">
                                    @if(!empty( Auth::user()->cover_photo))
                                        <img src="/uploads/{{ Auth::user()->cover_photo}}" style="width:500px; height:px;">
                                        <input type="file" id="cover_photo" name="cover_photo">
                                    @else
                                        <img src="/uploads/no-photo.png" style="width:500px; height:px;">
                                        <input type="file" id="cover_photo" name="cover_photo">

                                    @endif
                                    <p class="text-danger">{{$errors->first('title')}}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-sm-3 control-label ">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name='name' placeholder="Title" value="{{Auth::user()->name}}" required>
                                    <p class="text-danger">{{$errors->first('title')}}</p>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label ">Email</label>
                                <div class="col-sm-9">
                                    <input type='text' class="form-control" name="email" value="{{ Auth::user()->email }}" readonly="true">
                                    <p class="text-danger">{{$errors->first('status')}}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
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

@endsection