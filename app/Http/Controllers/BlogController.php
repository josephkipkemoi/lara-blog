<?php

namespace App\Http\Controllers;

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
    public function store(Request $request, Blog $blog)
    {
        //
        return $blog->validate($request);
    }

    // Update resource by id
    public function update(Request $request, $id)
    {
        return Blog::where('user_id', $id)->where('id', $request->blog_id)->update(['title' => $request->title,'body' => $request->body]);
    }

    // Get resource by id
    public function show($id, Blog $blog, Request $request)
    {
        return $blog->findOrFail($id);
    }

    // Remove resource by ID
    public function delete($id, Blog $blog)
    {
        $post = $blog->find($id);

        foreach($post->comments as $comment)
        {
            $comment->delete();
        }

        return $post->delete();
    }
}
