@extends('welcome')

@section('content')
<div class="container">
    <div class="card">
    <div class="card-header">{{$blog->title}}</div>
    <div class="card-body">
        <img src="{{$blog->image}}" alt="image"  class="img-thumbnail w-100" style="height:320px;"/>
        <p>{{$blog->body}}</p>
    </div>
    </div>
    
</div>
<div class="container">
<x-comment>

</x-comment>
</div>
@endsection