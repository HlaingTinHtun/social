@extends('layout.app')

@section('content')
    <style>
        body#register {
            background-image: url('/uploads/rain.jpg');
            background-size: 100%;
            background-repeat:no-repeat;
        }
        .register_space{
            padding-top: 10%;
        }


        #frmCheckPassword {padding:10px;}
        .demoInputBox{padding:7px;  border-radius:4px;}
        #password-strength-status {padding: 5px 10px;color: #FFFFFF; border-radius:4px;margin-top:5px;}
        .medium-password{background-color: #E4DB11;border:#BBB418 1px solid;}
        .weak-password{background-color: #FF6600;border:#AA4502 1px solid;}
        .strong-password{background-color: #12CC1A;border:#0FA015 1px solid;}
    </style>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function checkPasswordStrength() {
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

            if($('#password').val().length<6) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('weak-password');
                $('#password-strength-status').html("Weak (should be atleast 6 characters.)");
            } else {
                if($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('strong-password');
                    $('#password-strength-status').html("Strong");
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('medium-password');
                    $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
                }
            }
        }
    </script>

    <body id="register">

    <div class="container register_space">
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

                            <p style="color:red;">*String Only</p>

                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Profile Picture</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="image" value="{{ Request::old('image') }}">

                                @if ($errors->has('image'))<p style="color:red;">{{$errors->first('image')}}</p>@endif
                            </div>
                            <p style="color:red;">*Image</p>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ Request::old('email') }}">

                                @if ($errors->has('email'))<p style="color:red;">{{$errors->first('email')}}</p>@endif
                            </div>
                            <p style="color:red;">*Gmail Only</p>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6" name="frmCheckPassword" id="frmCheckPassword">

                                <input type="password" name="password" id="password" class="demoInputBox form-control" onKeyUp="checkPasswordStrength();" /><div id="password-strength-status"></div>
                                @if ($errors->has('password'))<p style="color:red;">{{$errors->first('password')}}</p>@endif

                            </div>


                            <p style="color:red;">*Any Character</p>
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
    </body>
@endsection
