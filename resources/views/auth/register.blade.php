@extends('layout.app')

@section('content')





<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    {!! Form::open(array('url' => '/register','method' => 'post', 'class'=> 'form-horizontal', 'files' =>'true')) !!}
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name"  value="{{ Request::old('name') }}">
                                @if ($errors->has('name'))<p style="color:red;">{{$errors->first('name')}}</p>@endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Profile Picture</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="image" value="{{ Request::old('image') }}">
                                @if ($errors->has('image'))<p style="color:red;">{{$errors->first('image')}}</p>@endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ Request::old('email') }}">
                                @if ($errors->has('email'))<p style="color:red;">{{$errors->first('email')}}</p>@endif
                            </div>
                        </div>





                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))<p style="color:red;">{{$errors->first('password')}}</p>@endif

                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    {!! form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
