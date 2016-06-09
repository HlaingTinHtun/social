@extends('layout.master')

@section('content')




        {!! Form::open(array('url' => 'admin/entry','method' => 'post', 'class'=> 'form-horizontal', 'files' =>'true')) !!}


            <div class="form-group">
                <label  class="col-sm-2 control-label entryfont">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name='title' placeholder="Title" value="{{ Request::old('title') }}" required>
                    <p class="text-danger">{{$errors->first('title')}}</p>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label entryfont">Status</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="status" rows="3" required>{{ Request::old('status') }}</textarea>
                    <p class="text-danger">{{$errors->first('status')}}</p>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label entryfont">Image/Music/Video</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="image" name="image">

                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name='submit'  value='ADD' class="btn btn-default">
                    <input type="reset" name='reset' value='Cancel' class="btn btn-default">
                    <a href="list"><strong>Back</strong></a>
                </div>

            </div>


        {!! form::close() !!}


@endsection


