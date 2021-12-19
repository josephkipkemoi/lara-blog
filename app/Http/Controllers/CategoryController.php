<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Blog;
use App\Models\Category;

class CategoryController extends Controller
{
    // create/add category
    public function __invoke(Category $category, CreateCategoryRequest $request)
    {
        return $category->create($request->validated());
    }

    // Get all posts related to category-id
    public function show($id)
    {
        return Category::find($id)->blog;
    }
}
