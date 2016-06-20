@extends('layout.app')
@section('content')
    <script>
        function download($name){
//            window.alert ("aye");
            window.location.href='/social/profile/download/'+name;
        }
    </script>


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    {!! Form::open(array('url' => 'social/update','method' => 'post', 'files' =>'true')) !!}
                        <div class="col-md-4">
                            <img src="/uploads/{{ Auth::user()->image}}" style="width:150px; height:150px;">
                            <input type="file" id="image" name="image">
                        </div>

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach


                        <div class="col-md-8">

                            <input type="hidden" class="form-control"  name='id' value="{{ Auth::user()->id }}">

                            <div class="form-group">
                                <label  class="col-sm-2 control-label ">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name='name' placeholder="Title" value="{{Auth::user()->name}}" required>
                                    <p class="text-danger">{{$errors->first('title')}}</p>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label ">Email</label>
                                <div class="col-sm-10">
                                    <input type='text' class="form-control" name="email" value="{{ Auth::user()->email }}" readonly="true">
                                    <p class="text-danger">{{$errors->first('status')}}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" name='submit'  value='Update' class="btn btn-success">
                                    <input type="reset" name='reset' value='Cancel' class="btn btn-default">
                                    {{--<button name='download' onclick="download({{Auth::user()->name}});"  class="btn btn-success">Download</button>--}}
                                    <a href="/social/profile/download">download</a>
                                </div>

                            </div>
                        </div>

                    {!! form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection