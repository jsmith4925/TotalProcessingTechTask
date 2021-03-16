@extends('templates.main')

@section('content')

@guest
<h2> Welcome, please register or login </h2>
@else
<h2> Hi {{ Auth::user()->name }}, <a href="/home">here to make a purchase?</a></h2>


@endguest

@endsection