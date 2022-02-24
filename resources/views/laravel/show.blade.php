@extends('welcome')

@section('content')
<div class="container">
    <div class="card">
    <div class="card-header">{{$blog->title}}</div>
    <div class="card-body">
        <img src="{{$blog->image}}" alt="image"/>
        <p>{{$blog->body}}</p>
    </div>
    </div>
    
</div>
<div class="container">
<x-comment>

</x-comment>
</div>
@endsection