<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // post comment
    public function store(Request $request, Comment $comment)
    {
        return $comment->validate($request);
    }

    // get comment related to blog
    public function show($id, Blog $blog)
    {
        return $blog->findOrFail($id)->comments;
    }

    // Delete comment
    public function delete($id, Comment $comment)
    {
        return $comment->findOrFail($id)->delete();
    }

    // Update comment
    public function update($id, Request $request, Comment $comment)
    {
        return $comment->findOrFail($id)->update(['comment_body' => $request->comment_body]);
    }
}
