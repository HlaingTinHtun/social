@extends('layout.app')

@section('content')


    <div class="col-md-1"></div>
    <div class="col-md-10">


    {!! Form::open(array('url' => 'entry','method' =>'get', 'class'=> 'form-horizontal', 'files' =>'true')) !!}

        <input type="submit" class="btn btn-success" name="submit" value="ADD New">

    <div class="table-responsive">
        <table class="table">
            <tr bgcolor="#d3d3d3">
                <td>No</td>
                <td>Title</td>
                <td>Status</td>
                <td>Image/Music/Movies</td>
                <td>Option</td>
            </tr>


               @foreach($articlelists as $article)
                <tr bgcolor="#f0ffff">
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->status }}</td>
                    <td>{{ $article->image }}</td>
                   <td><a href="/edit/{{ $article->id }}">Edit</a> |<a href="/delete/{{ $article->id }}")> Delete </a></td>
                </tr>
               @endforeach



        </table>
    </div>
    </div>
    <?php echo $articlelists->render() ?>
    <div class="col-md-1"></div>

    {!! form::close() !!}


 @endsection