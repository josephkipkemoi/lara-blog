@extends('welcome')

@section('content')
<div class="container">
    <div class="card" style="background-color: #DCDCDD;"> 
        <div class="d-flex justify-content-center bg-secondary" >
            <h1 class="display-2 fw-bold text-white">{{ config('app.name') }}</h1>
        </div>  
        @include('navigation')
        <div class="card-body">
                
                <div class="row m-2">
               
                <div class="card col-sm-12 shadow-sm p-3 bg-white rounded">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card-header text-white " style="background-color: #46494C;"><h3>Trending</h3></div>
                            @if($featured->count() > 0)

                            <div class="card shadow-sm p-3  bg-white rounded">
                                <div class="card-body">
                                    @if ($blog_title)                
                                    
                                    <div class="d-flex justify-content-center ">
                                        <img src="{{ $blog_title->image }}" class="rounded img-fluid  mt-1" style="height: 240px;" alt="image"/>
                                    </div>
                                    <div>
                                        <div class="pt-2">
                                        <a href="{{route('blog.show', [$blog_title->id])}}" class="text-decoration-none "><h5 class="card-title fw-bold text-black">{{ $blog_title->title }}</h5></a>                                    
                                        </div>
                                        <div style="height: 70px; overflow:hidden;">
                                            <p class="card-text">{{$blog_title->body}}</p>
                                        </div>

                                        <small class="text-secondary" style="font-size: 16px;">{{ $blog_title->created_at->diffForHumans() }}</small>

                                        <div class="pt-2 pb-2">
                                            <a href="{{route('blog.show', [$blog_title->id])}}" class="btn btn-dark btn-sm">VIEW POST</a>
                                        </div>
                                    </div>               
                                    @else 
                                        <div class="d-flex justify-content-center">
                                            <h1>Trending Topic</h1>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class=" col-sm-8 shadow-sm p-3 mb-2 bg-white rounded">
                            <div class="card-header text-white" style="background-color: #46494C;"><h3>Hot Topics</h3></div>
                            <div class="d-flex flex-wrap">
                                @foreach ($trending_side as $blog)
                                    <div class="col-sm-4 p-2 d-flex row align-items-center">
                                        <div class="pt-2">
                                            <a href="{{route('blog.show', [$blog->id])}}" class="text-decoration-none "><h5 class="card-title fw-bold text-black">{{ $blog->title }}</h5></a>                                    
                                        </div>
                                        <div style="height: 74px; overflow: hidden;">
                                            <p class="card-text">{{$blog->body}}</p>
                                        </div>
                                        <div> 
                                            <small class="text-secondary" style="font-size: 16px;">{{ $blog->created_at->diffForHumans() }}</small>
                                        </div>
                                        <div  >    
                                            <a href="{{route('blog.show', [$blog->id])}}" class="btn btn-dark btn-sm">VIEW POST</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                       
                    </div>
               
                </div>
                <div class="shadow p-3 mb-2 mt-2 bg-white rounded">
                <div class="card-header display-6 text-white mt-2" style="background-color: #46494C;"><h3>Featured</h3></div>
                    <div class="row">
                        @foreach ($featured as $blog)
                            <div class="col-sm-4 row align-items-center">
                                <div class="d-flex justify-content-center mt-1">
                                    <img src="{{ $blog->image }}" class="rounded img-fluid w-100" style="height: 240px;" alt="image"/>
                                </div>
                                <div>
                                    <div class="pt-2">
                                        <a href="{{route('blog.show', [$blog->id])}}" class="text-decoration-none"><h5 class="card-title fw-bold text-black">{{ $blog->title }}</h5></a>                                    
                                    </div>
                                    <div style="height: 74px; overflow: hidden;">
                                        <p class="card-text">{{$blog->body}}</p>
                                    </div> 
                                    <small class="text-secondary" style="font-size: 16px;">{{ $blog->created_at->diffForHumans() }}</small>

                                    <div class="pt-2 pb-2">    
                                        <a href="{{route('blog.show', [$blog->id])}}" class="btn btn-dark btn-sm">VIEW POST</a>
                                    </div>
                                </div>
                                
                            </div>
                           
                        @endforeach
    
                     </div>    
                @else
                    <div>No Posts</div>
                @endif
                </div>

                <div class="row shadow p-3 m-1  bg-white rounded">
                <div class="card-header text-white mb-2" style="background-color: #46494C;"><h3>Other News</h3></div>
                <div class="row">
                @foreach($blogs as $blog)                 
                    <div class="col-sm-3 row align-items-center">  
                        <div>
                            <img src="{{$blog->image}}" alt="image" class="img-fluid rounded w-100" style="height:240px;"/>
                        </div>
                        <div class="card-body">
                            <div class="pt-2">
                                <a href={{route('blog.show', [$blog->id])}} class="text-decoration-none"><h5 class="card-title fw-bold text-black">{{$blog->title}}</h5></a>
                            </div>
                            <div style="height:110px; overflow:hidden;">
                                <p class="card-text">{{$blog->body}}</p>
                            </div>
                            <small class="text-secondary" style="font-size: 16px;">{{ $blog->created_at->diffForHumans() }}</small>
                            <div class="pt-2 pb-2">
                                <a href="{{route('blog.show', [$blog->id])}}" class="btn btn-dark btn-sm">VIEW POST</a>
                            </div>
                        </div>            
                          
                    </div>                
                @endforeach
                </div>
                </div>
                </div>
             
        </div>
       <div class="p-5">
            {{ $blogs->links() ?? '' }}
       </div>
    </div>
    
</div>
@endsection