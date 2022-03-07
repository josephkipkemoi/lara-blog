@extends('welcome')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add Blog Post</div>
        <div class="card-body">
        @if(session()->has('status'))
            <div class="alert alert-success">
                <span>{{session()->get('status')}}</span>
            </div>
        @endif
            <form method="POST" action="{{route('admin.blog.store')}}">
            @csrf
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
                    <label>Category</label>
                    <select class="form-control" name="category">
                        @foreach ($categories as $key => $category)
                            <option value="{{ $key+1 }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                @error('author')
                    <span class="text-danger d-block">{{$message}}</span>
                @enderror
                    <label>Author</label>
                    <input type="text" class="form-control" placeholder="Author" name="author" value="{{old('author')}}"/>
                </div>
                <div class="form-group">
                @error('title')
                    <span class="text-danger d-block">{{$message}}</span>
                @enderror
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{old('title')}}"/>
                </div>
                <div class="form-group">
                @error('body')
                    <span class="text-danger d-block">{{$message}}</span>
                @enderror
                    <label>Body</label>
                    <textarea class="form-control" placeholder="Write blog post" name="body" value="{{old('body')}}"></textarea>
                </div>
                <div class="form-group">
                    <label>Image URL</label>
                    <input type="text" class="form-control" placeholder="Image URL" name="image" value="{{old('image')}}"/>
                </div>
                <div class="form-group">
                    <label>Tag</label>
                    <input type="text" class="form-control" placeholder="Add Tag(s)" name="tag" value="{{old('tag')}}"/>
                </div>
                <button class="btn btn-primary m-2" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection