<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // post comment
    public function store(Request $request, Comment $comment)
    {
        return $comment->validate($request);
    }
}
