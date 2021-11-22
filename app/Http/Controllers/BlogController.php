<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        return Blog::where('user_id','=', $request->user_id)->paginate(5);
    }

    public function store(Request $request, Blog $blog)
    {
        //
        return $blog->validate($request);
    }

}
