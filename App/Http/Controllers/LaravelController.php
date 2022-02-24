<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class LaravelController extends Controller
{
    //
    public function __invoke(Category $category)
    {
        $laravel_blogs = $category->find(1)->blog;

        return view('laravel.index', compact('laravel_blogs'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);

        return view('laravel.show', compact('blog'));
    }
}
