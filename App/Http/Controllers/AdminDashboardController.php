<?php

namespace App\Http\Controllers;

use App\DTO\CreateBlogDTO;
use App\Http\Requests\CreateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class AdminDashboardController extends Controller
{
    //
    public function __invoke()
    {
        return view('admin.dashboard');
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.create', compact('categories'));
    }

    public function store(CreateBlogRequest $request)
    {
        // Validate incoming request      
        // Add resource fields from data request
        $post = auth()->user()->blog()->create((array) new CreateBlogDTO(...$request->validated()));
    
        // Atttachh category ID
        $post->category()->attach($request->validated()['category']);
    
        // Send session messsage once resource is succesfully saved in Database
        session()->flash('status', 'Post added successfully !');

        return redirect()->route('admin.create');
    }
}
 