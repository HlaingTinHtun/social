@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    {!! Form::open(array('method' => 'post', 'files' =>'true')) !!}
                    <div class="col-md-4">
                        <img src="/uploads/{{ $pic->image}}" style="width:150px; height:150px;">
                        <input type="file" id="image" name="image">
                    </div>

                    <div class="col-md-8">

                        <input type="hidden" class="form-control"  name='id' value="{{$pic->id }}">

                        <div class="form-group">
                            <label  class="col-sm-2 control-label ">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name='name' placeholder="Title" value="{{$pic->name}}" required>
                                <p class="text-danger">{{$errors->first('title')}}</p>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ">Email</label>
                            <div class="col-sm-10">
                                <input type='text' class="form-control" name="email" value="{{ $pic->email }}" readonly="true">
                                <p class="text-danger">{{$errors->first('status')}}</p>
                            </div>
                        </div>


                    </div>

                    {!! form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection