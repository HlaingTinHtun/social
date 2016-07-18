@extends('layout.app')
@section('content')


    <body  id="guestprofile">
    <div class="container space_from_nav" >
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    {!! Form::open(array('method' => 'post','url'=> '/home','files' =>'true','class'=>'form-horizontal')) !!}

                    <div class="form-group">
                        <label  class="col-sm-2  control-label font_color ">Profile Picture</label>
                        <div class=" col-sm-9    well well-lg container">
                            <div class="col-sm-4">
                                <img src="/uploads/{{ $guest->image}}" style="width:150px; height:150px; cursor:no-drop">
                            </div>

                        </div>

                        <input type="hidden" class="form-control"  name='id' value="{{ $guest->id }}">

                        <div class="form-group">
                            <label  class="col-sm-2  control-label font_color">Cover Photo</label>
                            <div class="col-sm-9 col-offset-1 well well-lg container">

                                @if(!empty( $guest->cover_photo))
                                    <div class="col-sm-7">
                                        <img src="/uploads/{{ $guest->cover_photo }}" style="width:380px;">
                                    </div>

                                @else
                                    <div class="col-sm-7">
                                        <img src="/uploads/no-photo.png" style="width:380px;">
                                    </div>


                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label font_color">Name</label>
                            <div class="col-sm-9 guestspace">
                                <input type="text" class="form-control" id="title" name='name' placeholder="Title" value="{{$guest->name}}" readonly="true" style="cursor:no-drop">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label font_color">Email</label>
                            <div class="col-sm-9 guestspace">
                                <input type='text' class="form-control" name="email" value="{{ $guest->email }}" readonly="true" style="cursor:no-drop">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9 guestspace">
                                <input type="submit" name='reset' value='Cancel' class="btn btn-info">
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