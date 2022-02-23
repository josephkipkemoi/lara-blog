@extends('welcome')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add Blog Post</div>
        <div class="card-body">
        @if(session()->has('status'))
            <span>{{session()->get('status')}}</span>
        @endif
            <form method="POST" action="{{route('admin.blog.store')}}">
            @csrf
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
                    <input type="text" class="form-control" placeholder="title" name="title" value="{{old('title')}}"/>
                </div>
                <div class="form-group">
                @error('body')
                    <span class="text-danger d-block">{{$message}}</span>
                @enderror
                    <label>Body</label>
                    <input type="text" class="form-control" placeholder="body" name="body" value="{{old('body')}}"/>
                </div>
                <div class="form-group">
                    <label>Image URL</label>
                    <input type="text" class="form-control" placeholder="Image URL" name="img" value="{{old('img')}}"/>
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