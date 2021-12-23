<?php

namespace Domains\Comment\Http\Controllers;

use Domains\Comment\Http\Requests\CreateCommentRequest;
use Domains\Comment\Http\Requests\UpdateCommentRequest;
use Domains\Blog\Models\Blog;
use Domains\Comment\DTO\CreateCommentDTO;
use Domains\Comment\DTO\UpdateCommentDTO;
use Domains\Comment\Models\Comment;
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
        return $blog->comments()->create((array) new CreateCommentDTO(...$request->validated()));
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
        return tap($comment)->update((array) new UpdateCommentDTO(...$request->validated()))->toArray();
    }
}
