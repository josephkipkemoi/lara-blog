@extends('welcome')

@section('content')
 <div class="container">
    <div class="card">
        <div class="card-header">Edit Blog Post</div>
        <div class="card-body">
        @if(session()->has('message'))
            <div class="alert alert-success"><span>{{session()->get('message')}}</span></div>
        @endif
            <form method="POST" action="{{route('blog.update', [$blog->id])}}">
            @csrf
            @method('PATCH')
                <div class="form-group">
                    <label>Post Title</label>
                    <select class="form-control" name="blog_title">
                        <option value={{0}}>False</option>
                        <option value={{1}}>True</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Featured</label>
                    <select class="form-control" name="featured">
                        <option value={{0}}>False</option>
                        <option value={{1}}>True</option>
                    </select>
                </div>
                <div class="form-group">
                @error('author')
                    <span class="text-danger d-block">{{$message}}</span>
                @enderror
                    <label>Author</label>
                    <input type="text" class="form-control" placeholder="Author" name="author" value="{{$blog->author}}"/>
                </div>
                <div class="form-group">
                @error('title')
                    <span class="text-danger d-block">{{$message}}</span>
                @enderror
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{$blog->title}}"/>
                </div>
                <div class="form-group">
                @error('body')
                    <span class="text-danger d-block">{{$message}}</span>
                @enderror
                    <label>Body</label>
             
                    <textarea class="form-control" placeholder="Write blog post" name="body" value="{{$blog->body}}">{{$blog->body}}</textarea>
                </div>
                <div class="form-group">
                    <label>Image URL</label>
                    <input type="text" class="form-control" placeholder="Image URL" name="image" value="{{$blog->image}}"/>
                </div>
                <div class="form-group">
                    <label>Tag</label>
                    <input type="text" class="form-control" placeholder="Add Tag(s)" name="tag" value="{{$blog->tag}}"/>
                </div>
                <button class="btn btn-primary m-2" type="submit">Update</button>
            </form>
        </div>
    </div>
 </div>   
@endsection