<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

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

Route::post('/blog', [BlogController::class, 'store']);
Route::get('/blog', [BlogController::class, 'index']);
Route::put('/blog/{id}', [BlogController::class,'update']);
Route::get('/blog/{id}', [BlogController::class, 'show']);
Route::delete('/blog/{id}', [BlogController::class, 'delete']);

Route::post('/comment', [CommentController::class, 'store']);
Route::get('/comment/{id}', [CommentController::class, 'show']);
Route::delete('/comment/{id}', [CommentController::class, 'delete']);
Route::put('/comment/{id}',[CommentController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
