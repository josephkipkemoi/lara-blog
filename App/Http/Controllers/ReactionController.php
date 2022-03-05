<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    //
    public function toggle(Blog $blog, Comment $comment)
    {
          $comment->toggleReaction(request()->reaction);
    }
}
