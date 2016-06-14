@extends('layout.master')

@section('content')



    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>
        $('.like').on('click',function(event){
        var isLike=event.target.previousElementSibling == null ? true: false;
     console.log(isLike);
    });
    </script>




    <style>
        #panel, #cmt {
            padding: 5px;
            text-align: right;
            /*background-color: #e5eecc;*/
            /*border: solid 1px #c3c3c3;*/
        }

        #panel {
            padding: 50px;
            display: none;
            border: solid 1px #c3c3c3;
        }
        </style>



        @foreach($articlelist as $article)
            <div class="well well-lg">
                    <strong>{{ $article ->title }}</strong>
                <div>
                    {{ $article->status }}
                </div>
                <?  $type =array('jpg','tif','png','gif');
                 $imageFileType = pathinfo($article->image,PATHINFO_EXTENSION);?>

                @if(in_array($imageFileType,$type))
                    <div class="container">
                        <img src="/uploads/{{$article->image}}" width="150">
                    </div>

                        {{--<div class="container">--}}
                        {{--<div class="col-sm-1">--}}
                        {{--<div class="interaction"></div>--}}
                            <a href="" class="like">Like</a>
                           <a href="" class="like">DisLike</a>
                        {{--</div>--}}
                        {{--</div>--}}





                    <div>
                        <Strong><a href="https://www.google.com/search?q={{$article->image}}&oq={{$article->image}}hrase&gws_rd=ssl">View Related Source</a></Strong>
                    </div>
                    @elseif($imageFileType =='mp3')
                        <audio controls>
                            <source src="/uploads/{{$article->image}}" type="audio/ogg">
                        </audio>
                        <div class="well well-sm">
                            <strong><a href="">Like</a></strong>
                            <strong><a href="">Comment</a></strong>
                        </div>
                        <div>
                            <a href="https://www.google.com/search?q={{$article->image}}&oq={{$article->image}}hrase&gws_rd=ssl">View Related Source</a>
                        </div>

                    @elseif($imageFileType =='mp4')
                        <video width="320" height="240" controls>
                            <source src="/uploads/{{$article->image}}" type="video/mp4">
                        </video>

                        <div class="well well-sm">
                            <strong><a href="">Like</a></strong>
                            <strong><a href="">Comment</a></strong>
                        </div>
                        <div>
                            <a href="https://www.google.com/search?q={{$article->image}}&oq={{$article->image}}hrase&gws_rd=ssl">View Related Source</a>
                        </div>

                    @else
                        {{ $article->image}}
                    @endif


                <h4>Post By.....</h4><strong>
                </strong> <? echo date("Y-m-d").date('l')?>
            </div>


        @endforeach




@endsection