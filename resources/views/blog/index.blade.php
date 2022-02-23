@extends('welcome')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Blogs</div>
        <div class="card-body">
            
                <div class="row">
                    <div class="bg-primary col-sm-12 w-100">
                        <h1>Post Title</h1>
                    </div>
                    <div class="bg-secondary col-sm-6">
                        <div>
                            <h2>Feature Post</h2>
                        </div>                      
                    </div>  
                    <div class="bg-secondary col-sm-6">
                        <h2>Feature Post</h2>
                    </div>
                @foreach($blogs as $blog)                 
                    <div class="card col-sm-3 ">              
                            <a href={{route('blog.show', [$blog->id])}}><h1>Blogs</h1></a>
                            <a href="{{route('blog.show', [$blog->id])}}">Continue reading</a>
                    </div>                
                @endforeach
                </div>
            
        </div>
    </div>
</div>
@endsection