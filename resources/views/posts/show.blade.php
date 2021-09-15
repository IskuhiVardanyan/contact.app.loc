@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="/posts" class="btn btn-success">Go Back</a>
        <h1>{{$post->title}}</h1>
        <div>
            {{$post->body}}
        </div>
        <br>
        <small>Written on {{$post->created_at}}</small>
        <br> <br>
        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="pull-right">
            <input type="hidden" name="_method" value="DELETE">
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

@endsection

