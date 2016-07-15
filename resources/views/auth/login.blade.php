@extends('layout.app')

@section('content')
    <style>
        body#login {
            background-size: 100%;
            background-repeat:no-repeat;
            background-image: url('/uploads/rain.jpg');
        }
        .login_space{
            padding-top: 12%;
        }
    </style>
    <body id='login' >
<div class="container login_space">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ Request::old('email') }}">
                                @if ($errors->has('email'))<p style="color:red;">{{$errors->first('email')}}</p>@endif


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control"  placeholder="Enter Password" name="password">
                                @if ($errors->has('password'))<p style="color:red;">{{$errors->first('password')}}</p>@endif

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </body>
@endsection

