@if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@elseif (Session::has('success'))
    An email with the password reset has been sent.
@endif

<form class="form-horizontal" role="form" method="post" action="{{ url('/') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

<p>{{ Form::label('email', 'Email') }}
    {{ Form::text('email') }}</p>

<p>{{ Form::submit('Submit') }}</p>

</form>