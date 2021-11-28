<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Blog $blog)
    {
        return $blog->comments;
    }

    // post comment
    public function store(CreateCommentRequest $request,Blog $blog)
    {
        return $blog->comments()->create($request->validated());
    }

    // get comment related to blog
    public function show(Blog $blog, Comment $comment)
    {
        return $comment;
    }

    // Delete comment
    public function destroy(Blog $blog, Comment $comment)
    {
        return $comment->delete();
    }

    // Update comment
    public function update(UpdateCommentRequest $request,Blog $blog,Comment $comment)
    {
        return tap($comment)->update($request->validated())->toArray();
    }
}
