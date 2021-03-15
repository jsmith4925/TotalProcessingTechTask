@extends('templates.main')

@section('content')

<h1>Content</h1>

@guest
<h2> Welcome, please register or login </h2>
@else
<h2> Hi {{ Auth::user()->name }}, your email address is {{ Auth::user()->email }} you are at the index </h2>
<a href="/home">Make a purchase</a>

@endguest

@endsection