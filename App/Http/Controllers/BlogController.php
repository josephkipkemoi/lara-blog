<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::all();

        return view('blog.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);

        $comments = $blog->comment;

        return view('blog.show', compact('blog','comments'));
    }
}
