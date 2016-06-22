@extends('layout.app')
@section('content')



    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    {!! Form::open(array('method' => 'post', 'files' =>'true','class'=>'form-horizontal')) !!}
                    <div class="col-md-4">
                        <img src="/uploads/{{ $guest->image }}" style="width:150px; height:150px;">
                        <input type="file" id="image" name="image" readonly="true">
                    </div>

                    <div class="col-md-8">

                        <div class="form-group">
                            <label  class="col-sm-2 control-label ">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  name='name' value="{{ $guest->name }}"  readonly="true">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label ">Email</label>
                            <div class="col-sm-10">
                                <input type='text' class="form-control" name="email" value="{{ $guest->email}}"readonly="true">

                            </div>
                        </div>
                    </div>

                    {!! form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection