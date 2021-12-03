<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  Get resource based on user id
    public function index()
    {
        return Blog::paginate(5);
    }

    // Store resource to Database
    public function store(Blog $blog, CreateBlogRequest $request)
    {
        //
        return $blog->create($request->validated());
    }

    // Update resource by id
    public function update(Blog $blog,UpdateBlogRequest $request)
    {
        return tap($blog)->update($request->validated());
    }

    // Get resource by id
    public function show($id)
    {
        return Blog::findOrFail($id);
    }

    // Remove resource by ID
    public function destroy(Blog $blog)
    {
        // $post = $blog->find($id);

        // foreach($post->comments as $comment)
        // {
        //     $comment->delete();
        // }

        // return $post->delete();
        return $blog->delete();
    }
}
