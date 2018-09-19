@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-outline-secondary mb-4">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img class="img-fluid w-100" style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    <br><br>
    <div>
        {!!$post->body!!} {{-- html escape Change syntax --}}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if (!Auth::guest()) {{-- edit & delete buttons, not guest --}}
        @if (Auth::user()->id == $post->user_id) {{-- edit & delete buttons, same user post --}}
            <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-secondary">Edit</a>     
            {!! Form::open([
                'action' => ['PostsController@destroy', $post->id], 
                'method' => 'POST',
                'class' => 'float-right'
                ]) 
            !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
    @endif
@endsection
