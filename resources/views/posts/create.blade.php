@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create Post</h1>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="" class="form-control" placeholder="Title" >
            </div>
            <br>
            <div>
                <label for="body">Body</label>
                <textarea id="article-ckeditor" name="body" class="form-control" placeholder="Body Text" ></textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

