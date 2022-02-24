@extends('welcome')

@section('content')
<div class="container ">

    <div class="row">
        @foreach($laravel_blogs as $blog)
        <div class="card col-sm-4" style="width: 18rem;">
         
            <img src="{{$blog->image}}" alt="image" class="card-img-top img-thumbnail img-fluid mt-1"/>
        
            <div class="card-body">    
                <h5 class="card-title">{{$blog->title}}</h5>            
                <p class="card-text">{{$blog->body}}</p>
                <a href="{{route('laravel.show', [$blog->id])}}" class="btn btn-primary btn-sm">Continue reading</a>
            </div>

            <div class="card-footer bg-white">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>

        </div>
        @endforeach
    </div>

</div>
@endsection