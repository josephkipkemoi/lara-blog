<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Throwable;

use function PHPUnit\Framework\returnSelf;
use function PHPUnit\Framework\throwException;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::all();

        $blog_title = Blog::where('blog_title',true)->latest()->first();

        $featured = Blog::where('featured', true)->latest()->get();
 
        return view('blog.index', compact('blogs', 'blog_title', 'featured'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        $comments = $blog->comment;

        return view('blog.show', compact('blog','comments'));
    }
}
