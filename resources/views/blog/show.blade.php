@extends('welcome')

@section('content')
    <div class="container">
        <div class="card p-4">
        <img src="{{$blog->image}}" alt="image" class="img-thumbnail w-100" style="height:320px;"/>            
            <div class="card-body">
                <h5 class="card-title">{{$blog->title}}</h5>
                <span>Post by: {{$blog->author}} <small class="text-info">{{ $blog->created_at }}</small></span>
                <div>
                    <p>{{$blog->body}}</p>
                </div>

                <div class="d-flex">
                <a href="{{ route('blog.create', [$blog->id]) }}" class="btn btn-primary">Edit</a>

                <form method="POST" action="{{ route('blog.delete', [$blog->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="card container mt-4 p-4">
            <div class="p-4"><span class="bg-dark text-white rounded p-2">Discussion</span></div>
            <div class="row justify-content-center">
                <div class="col col-4 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person-circle float-end" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                </div>
                <div class="col col-6 card bg-light">
                    <div class="card-body">
                        <span>{{ auth()->user()->full_name }}</span>
                            <form method="POST" action="{{route('comment.store', [$blog->id])}}">
                            @csrf
                                @error('comment_body')
                                    <small class="text-danger">{{ $message }}</small>    
                                @enderror
                                <textarea name="comment_body" class="form-control" placeholder="Leave a comment"></textarea>
                                <button type="submit" class="btn btn-dark p-2 float-end mt-2">Post Comment</button>
                            </form>
                    </div>
                </div>
                <div class="p-4"><span class="p-2 fw-bold">{{ $comment_count }} Comments</span></div>
                <div class="row justify-content-md-center">
                @if ($comments->count() > 0)
                @foreach ($comments as $comment)
                <div class="col col-sm-4 p-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person-circle float-end" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                </div>
                <div class="col col-sm-6 card bg-light p-4 mb-2">                   
                    
                        <div class="d-flex justify-content-between">
                            <div>
                                <span>{{ $comment->user->name }} <small class="text-secondary">{{ $comment->user->created_at }}</small></span>
                            </div>
                        </div>
                            <div class="mt-2 mb-2">
                                <span>{{ $comment->comment_body }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <form method="POST" action="{{route('comment.like', [$blog->id, $comment->id])}}">
                                    @csrf
                                        <button type="submit"> <small>Like (0) | </small></button>
                                </form>
                               
                                <small>Reply | </small>
                                <small>Edit | </small>
                                @if(auth()->user() && $comment->user_id == auth()->user()->id)
                                    <form method="POST" action="{{route('comment.delete', [$blog->id,$comment->id])}}">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit"><small>Remove</small></button>
                                    </form>
                                @endif
                              
                            </div>                                         
                   
                    </div>
                    @endforeach
                    @endif
                
                    </div>
                </div>
                 
            </div>
      </div>

    </div>
@endsection