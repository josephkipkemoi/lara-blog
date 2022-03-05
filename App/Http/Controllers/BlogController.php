<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Like;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Throwable;

use function PHPUnit\Framework\returnSelf;
use function PHPUnit\Framework\throwException;

class BlogController extends Controller
{
    //
    public function create($id)
    {
        $blog = Blog::find($id);

        return view('blog.edit', compact('blog'));
    } 

    public function index()
    {
        $blogs = Blog::orderByRaw('created_at DESC')->paginate(8);

        $blog_title = Blog::where('blog_title',true)->latest()->first();

        $featured = Blog::where('featured', true)->orderByRaw('created_at DESC')->paginate(3);

        $trending_side = Blog::orderByRaw('created_at DESC')->paginate(6);

        $categories = Category::all();

        return view('blog.index', compact('blogs', 'blog_title', 'featured','trending_side', 'categories'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        $time_stamp = $blog->created_at->diffForHumans();

        $comments = $blog->comment;

        $comment_count = $comments->count();

        $likes_count = 0;

        return view('blog.show', compact('blog','comments', 'comment_count','likes_count', 'time_stamp'));
    }

    public function destroy($id)
    {
        Blog::find($id)->delete();

        return redirect()->route('blog.index');
    }

    public function update($id)
    {
        $data = request()->validate([
            'blog_title' => ['string'],
            'body' => ['string'],
            'image' => ['string']
        ]);

        Blog::find($id)->update([
            'body' => $data['body'],
            'blog_title' => $data['blog_title'],
            'image' => $data['image']
        ]);

        session()->flash('message', 'Post updated successfully');

        return redirect()->route('blog.create', [$id]);
    }

    public function category($id)
    {
        $blogs = Category::find($id)->blog;

        return view('category.index', compact('blogs','id'));
    }

    public function categoryShow($category_id, $blog_id)
    {
        $blog = Blog::find($blog_id);

        $comments = $blog->comment;

        $comment_count = $comments->count();

        return view('category.show', compact('blog','comments', 'comment_count'));
    }
}
