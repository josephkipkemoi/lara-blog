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

                <div class="card col-sm-12">
                @if ($blog_title)                
                    <div class="d-flex justify-content-center ">
                        <img src="{{ $blog_title->image }}" class="img-thumbnail img-fluid w-100 mt-1" style="height: 240px;" alt="image"/>
                    </div>
                    <div>
                        <a href="{{route('blog.show', [$blog_title->id])}}" class="text-decoration-underline fw-bold"><h5 class="card-title">{{ $blog_title->title }}</h5></a>                                    
                        <div style="height: 70px; overflow:hidden;">
                            <p class="card-text">{{$blog_title->body}}</p>
                        </div>
                        <div class="pt-2 pb-2">
                            <a href="{{route('blog.show', [$blog_title->id])}}" class="btn btn-primary btn-sm">VIEW POST</a>
                        </div>
                    </div>               
                @else 
                    <div class="d-flex justify-content-center">
                        <h1>Trending Topic</h1>
                    </div>
                @endif
                </div>
                <div class="card-header display-6 bg-danger text-white fw-bold">Featured</div>
                    <div class="row justify-content-around p-2" style="height: 400px; overflow-y:scroll;">
                        @foreach ($featured as $blog)
                            <div class=" col-sm-5 mt-1">
                                <div class="d-flex justify-content-center mt-1">
                                    <img src="{{ $blog->image }}" class="img-thumbnail img-fluid w-100" style="height: 240px;" alt="image"/>
                                </div>
                                <div>
                                    <a href="{{route('blog.show', [$blog->id])}}" class="text-decoration-underline fw-bold"><h5 class="card-title">{{ $blog->title }}</h5></a>                                    
                                    <div style="height: 74px; overflow: hidden;">
                                        <p class="card-text">{{$blog->body}}</p>
                                    </div> 
                                    <div class="pt-2 pb-2">    
                                        <a href="{{route('blog.show', [$blog->id])}}" class="btn btn-primary btn-sm">VIEW POST</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
    
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
                            <div style="height:120px; overflow:hidden;">
                                <p class="card-text">{{$blog->body}}</p>
                            </div>
                            <a href="{{route('blog.show', [$blog->id])}}" class="btn btn-primary btn-sm">VIEW POST</a>
                        </div>            
                          
                    </div>                
                @endforeach
                
                </div>
            
        </div>
    </div>
</div>
@endsection