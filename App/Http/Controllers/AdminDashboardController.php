<?php

namespace App\Http\Controllers;

class AdminDashboardController extends Controller
{
    //
    public function __invoke()
    {
        return view('admin.dashboard');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store()
    {
        $data = request()->validate([
            'featured' => ['required', 'boolean'],
            'blog_title' => ['required', 'boolean'],
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
        $blog->category()->sync(1);

        session()->flash('status', 'Blog added successfully !');

        return redirect()->route('admin.create');
    }
}
 