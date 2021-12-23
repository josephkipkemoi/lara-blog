<?php

namespace Domains\Tag\Http\Controllers;

use Domains\Tag\Http\Requests\CreateTagRequest;
use Domains\Blog\Models\Blog;
use Domains\Tag\DTO\CreateTagDTO;
use Domains\Tag\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    // create/add tag
    public function __invoke(Tag $tag, CreateTagRequest $request)
    {
        return $tag->create((array) new CreateTagDTO(...$request->validated()));
    }

    // get tags related to blog post
    public function show($id, Blog $blog)
    {
        return $blog->find($id)->tags;
    }

    // return blog posts related to tag
    public function index(Request $request, Tag $tag)
    {
        return $tag->find($request->input('tag_id'))->blogs;
    }
}
