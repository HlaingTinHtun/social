@extends('layout.app')

@section('content')

    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <div class="col-md-1"></div>
    <div class="col-md-10">

        {!! Form::open(array('url' =>'/update','method' => 'post', 'files' => true, 'class'=> 'form-horizontal')) !!}


            <div class="form-group">
                <label  class="col-sm-2 control-label entryfont">Title</label>
                <div class="col-sm-10">
                    <input type="hidden" name="id" value="{{ $article->id }}">
                    <input type="text" class="form-control" id="title" name='title' value={{ $article->title }} placeholder="Title">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label entryfont">Status</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="status" rows="3">{{ $article->status }}</textarea>
                </div>
            </div>

            <div   ng-app="myApp" ng-controller="myCtrl"  class="form-group">
                <label  class="col-sm-2 control-label entryfont">Image/Music/Video</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="image" name="image" >
                    <span ng-bind="upload"></span>
                </div>
            </div>

        <script>
            var app = angular.module('myApp', []);
            app.controller('myCtrl', function($scope) {
                $scope.upload= "";

            });
        </script>

            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <?  $imageFileType = pathinfo($article->image,PATHINFO_EXTENSION);
                    $type =array('jpg','jpeg','png','bmp','gif'); ?>

                    @if(in_array($imageFileType,$type))

                      <img src = "/uploads/{{ $article->image }}" width="150" height="150">

                    @elseif ($imageFileType == 'mp3')
                        <audio controls>
                            <source src= "/uploads/{{ $article->image }}" type="audio/mpeg">
                        </audio>

                    @elseif ($imageFileType == 'mp4')
                        <video width="400" controls>
                            <source src="/uploads/{{ $article->image }}" type="video/mp4">
                        </video>
                    @else
                        {{ $article->image }}
                    @endif
                </div>

            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name='submit'  value='Update' class="btn btn-default">
                    <input type="reset" name='reset' value='Cancel' class="btn btn-default">
                    <a href="/list"><strong>Back</strong></a>
                </div>

            </div>

        {!! form::close() !!}
    </div>
    <div class="col-md-1"></div>


@endsection


