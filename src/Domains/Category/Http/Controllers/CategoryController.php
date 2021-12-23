<?php

namespace Domains\Category\Http\Controllers;

use Domains\Category\DTO\CreateCategoryDTO;
use Domains\Category\Http\Requests\CreateCategoryRequest;
use Domains\Blog\Models\Blog;
use Domains\Category\Models\Category;

class CategoryController extends Controller
{
    // create/add category
    public function __invoke(Category $category, CreateCategoryRequest $request)
    {
        return $category->create((array) new CreateCategoryDTO(...$request->validated()));
    }

    // Get all posts related to category-id
    public function show($id)
    {
        return Category::find($id)->blog;
    }
}
