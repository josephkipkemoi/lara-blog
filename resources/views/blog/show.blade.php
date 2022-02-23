@extends('welcome')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{$blog->title}}</div>
            <div class="card-body">
                <img src="{{$blog->image}}" alt="image" class="img-thumbnail"/>
                <span>Post by: {{$blog->author}}</span>
                <p>{{$blog->body}}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
           <x-comment>
              {{$blog->id}}
           </x-comment>
        </div>
        <div class="container row">
            @foreach($comments as $comment)
                <span>{{$comment->user->name}}</span>
                <span class="d-block">{{$comment->comment_body}}</span>
            @endforeach
        </div>
    </div>
@endsection