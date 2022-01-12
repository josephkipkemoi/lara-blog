<?php

namespace Modules\Comment\Http\Controllers;

use Modules\Comment\Http\Requests\CreateCommentRequest;
use Modules\Comment\Http\Requests\UpdateCommentRequest;
use Modules\Blog\Models\Blog;
use Modules\Comment\DTO\CreateCommentDTO;
use Modules\Comment\DTO\UpdateCommentDTO;
use Modules\Comment\Models\Comment;
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
