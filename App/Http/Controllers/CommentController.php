<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Like;

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

    public function destroy($blog_id,$comment_id)
    {
        Comment::find($comment_id)->delete();

        return redirect()->route('blog.show', $blog_id);
    }

    public function like(Blog $blog)
    {
         Like::create([
             'comment_id' => 1,
             'like' => 1
         ]);

        return redirect()->route('blog.show', [1]);
    }
}
