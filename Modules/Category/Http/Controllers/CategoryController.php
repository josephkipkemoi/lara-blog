<?php

namespace Modules\Category\Http\Controllers;

use Modules\Category\DTO\CreateCategoryDTO;
use Modules\Category\Http\Requests\CreateCategoryRequest;
use Modules\Blog\Models\Blog;
use Modules\Category\Models\Category;

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
