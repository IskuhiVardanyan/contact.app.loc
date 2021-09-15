@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <a class="nav-link" href="/posts/create">Create Post</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($post) > 0)
                        <table class="table">
                            <tr>
                                <th scope="col">Post id</th>
                                <th scope="col">Post title</th>
                                <th scope="col">Post body</th>
                            </tr>
                            @foreach($post as $p)
                                <tr>
                                    <td> {{$p->id}}</td>
                                    <td>{{$p->title}}</td>
                                    <td> {{$p->body}}</td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                        <h3>No posts</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
