<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Modules\Blog\Http\Controllers\BlogController;
use Modules\Category\Http\Controllers\CategoryController;
use Modules\Comment\Http\Controllers\CommentController;
use Modules\Tag\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('v1/blogs', BlogController::class);
Route::apiResource('v1/blogs/{blog}/comments', CommentController::class);

Route::post('v1/tags', TagController::class);
Route::get('v1/tags', [TagController::class,'index']);
Route::get('v1/tags/{tag}', [TagController::class,'show']);
Route::get('v1/tags/{tag}/blogs', [TagController::class,'index']);

Route::post('v1/categories', CategoryController::class);
Route::get('v1/categories/{category}', [CategoryController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
