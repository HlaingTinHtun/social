<nav class="navbar navbar-default navbar-fixed-top">
<div class="container">
<div class="navbar-header">

<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
<span class="sr-only">Toggle Navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<a class="navbar-brand">
Social
</a>
</div>


<div class="collapse navbar-collapse" id="app-navbar-collapse">

<ul class="nav navbar-nav">
<li><a href="{{ url('/home') }}">Home</a></li>


</ul>
<!-- Right Side Of Navbar -->
<ul class="nav navbar-nav navbar-right">
<!-- Authentication Links -->
@if (Auth::guest())
<li><a href="{{ url('/login') }}">Login</a></li>
<li><a href="{{ url('/register') }}">Register</a></li>
@else
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
<img src="/uploads/{{Auth::user()->image}}" width="30px" height="25px">{{ Auth::user()->name }} <span class="caret"></span>
</a>


<ul class="dropdown-menu" role="menu">
<li><a href="/social/profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>profile</a></li>
<li><a href="/timeline"><span class="glyphicon glyphicon-home"></span>Timeline</a></li>
    <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>

</ul>

</li>
@endif
</ul>
</div>
</div>
</nav>