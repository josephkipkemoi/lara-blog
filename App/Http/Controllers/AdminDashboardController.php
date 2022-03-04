<?php

namespace App\Http\Controllers;

use App\Models\Category;

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

    public function store()
    {
        $data = request()->validate([
            'featured' => ['required', 'boolean'],
            'blog_title' => ['required', 'boolean'],
            'category' => ['required'],
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'body' => ['required', 'string'],
            'image' => ['string'],
            'tag' => ['string']
        ]);
        
        $blog = auth()->user()->blog()->create([
            'title' => $data['title'],
            'author' => $data['author'],
            'body' => $data['body'],
            'image' => $data['image'],
            'tag' => $data['tag'],
            'featured' => $data['featured'],
            'blog_title' => $data['blog_title'],
        ]);

        // Atttachh category ID
        $blog->category()->attach($data['category']);

        session()->flash('status', 'Blog added successfully !');

        return redirect()->route('admin.create');
    }
}
 