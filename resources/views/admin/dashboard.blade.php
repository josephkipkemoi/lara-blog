@extends('welcome')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Admin Dashboard</div>
        <div class="card-body">
            <div>
                <a href="{{route('admin.create')}}" class="btn btn-primary">Add Post</a>
            </div>
        </div>
    </div>
</div>
@endsection

