@extends('welcome')

@section('content')
<div class="container">
    <div class="card">
        <div class="d-flex justify-content-center bg-primary ">
            <h1 class="display-2 fw-bold text-white">LARAVEL BLOG</h1>
        </div>  
        
        <div class="card-body">
              <div class="card-header display-6 bg-danger text-white fw-bold">Trending</div>
                
                <div class="row mt-2">
                @if($featured->count() > 0)
                    <div class="row justify-content-around">
                           <div class="card col-sm-5 p-2">
                            <div class="d-flex justify-content-center">
                                <img src="{{$featured[0]->image}}" class="img-thumbnail img-fluid w-100" style="height:240px" alt="image"/>
                            </div>
                                <div>
                                    <a href="{{route('blog.show', [$featured[0]->id])}}" class="text-decoration-underline fw-bold"><h5 class="card-title">{{$featured[0]->title }}</h5></a>                                    
                                    <p class="card-text">{{$featured[0]->body}}</p>
                                    <a href="{{route('blog.show', [$featured[0]->id])}}" class="btn btn-primary btn-sm">VIEW POST</a>
                                </div> 
                            </div>

                            <div class="card col-sm-5 p-2">
                            <div>
                                <img src="{{$featured[1]->image}}" class="img-thumbnail img-fluid w-100" style="height:240px" alt="image"/>
                            </div>
                                <div>
                                    <a href="{{route('blog.show', [$featured[1]->id])}}" class="text-decoration-none"><h5 class="card-title">{{$featured[1]->title }}</h5></a>                                    
                                    <p class="card-text">{{$featured[1]->body}}</p>
                                    <a href="{{route('blog.show', [$featured[1]->id])}}" class="btn btn-primary btn-sm">VIEW POST</a>
                                </div>
                            </div>  
                     </div>    
                @else
                    <div>No Posts</div>
                @endif
                <div class="bg-danger text-white mt-2">
                    <h3 class="fw-bold">Recent Posts</h3>
                </div>  
                    
                @foreach($blogs as $blog)                 
                    <div class="card col-sm-3 ">  
                        <div>
                            <img src="{{$blog->image}}" alt="image" class="img-fluid img-thumbnail w-100" style="height:240px;"/>
                        </div>
                        <div class="card-body">
                            <a href={{route('blog.show', [$blog->id])}} class="text-decoration-none"><h5 clas="card-title">{{$blog->title}}</h5></a>
                            <p class="card-text">{{$blog->body}}</p>
                            <a href="{{route('blog.show', [$blog->id])}}" class="btn btn-primary btn-sm">VIEW POST</a>
                        </div>            
                          
                    </div>                
                @endforeach
                
                </div>
            
        </div>
    </div>
</div>
@endsection