@extends('layouts/app')
@section('content')
    <div class="container">
        <h1 class="fg">Edit Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value={{$post->title}} class="form-control" placeholder="Title" >
            </div>
            <br>
            <div>
                <label for="body">Body</label>
                <textarea id="article-ckeditor" name="body" class="form-control" placeholder="Body Text">{{$post->body}}</textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

