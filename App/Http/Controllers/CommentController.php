<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class CommentController extends Controller
{
    //

    public function store(Blog $blog)
    {
        $data = request()->validate([
            'comment_body' => ['required', 'string'] 
        ]);

        $blog->comment()->create([
            'user_id' => auth()->user()->id,
            'comment_body' => $data['comment_body']
        ]);

        return redirect()->route('blog.show', [$blog->id]);
    }
}
