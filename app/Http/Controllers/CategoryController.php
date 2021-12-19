<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    // create/add category
    public function __invoke(Category $category, CreateCategoryRequest $request)
    {
        return $category->create($request->validated());
    }
}
