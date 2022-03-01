@extends('welcome')

@section('content')
    <div class="container">
        <div class="card">
        <img src="{{$blog->image}}" alt="image" class="img-thumbnail w-100" style="height:320px;"/>            
            <div class="card-body">
                <h5 class="card-title">{{$blog->title}}</h5>
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
        <div class="container row mt-2">
        <h5>Comments</h5>
            @foreach($comments as $comment)
                <div class="d-flex badge bg-black ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                    <span class="p-1 ml-1 text-white">{{$comment->user->name}}</span>
                </div>
                <div class="card">
                    <span class="d-block">{{$comment->comment_body}}</span>
                    <div class="d-flex">

                        <form method="POST" action="{{route('comment.like', [$blog->id, $comment->id])}}">
                        @csrf
                            <button type="submit">Like (0)</button>
                        </form>

                        @if(auth()->user() && $comment->user_id == auth()->user()->id)
                            <form method="POST" action="{{route('comment.delete', [$blog->id,$comment->id])}}">
                            @csrf
                            @method('DELETE')
                                <button type="submit">Remove</a>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection