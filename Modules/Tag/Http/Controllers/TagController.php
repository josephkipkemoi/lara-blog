<?php

namespace Modules\Tag\Http\Controllers;

use Modules\Tag\Http\Requests\CreateTagRequest;
use Modules\Blog\Models\Blog;
use Modules\Tag\DTO\CreateTagDTO;
use Modules\Tag\Models\Tag;
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
    public function index(Tag $tag)
    {
        return $tag->blogs;
    }
}
