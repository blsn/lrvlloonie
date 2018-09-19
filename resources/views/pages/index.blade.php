@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p>This is the homepage</p>
        @if (Auth::guest()) {{-- login/register buttons, guest only --}}
            <p><a href="/login" class="btn btn-primary btn-lg" role="button">Login</a> <a href="/register" class="btn btn-success btn-lg" role="button">Register</a></p>
        @endif
    </div>
@endsection
