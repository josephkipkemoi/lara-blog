<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LaravelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('blog.index');
})->name('main');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/laravel', [LaravelController::class, '__invoke'])->name('laravel');
Route::get('/laravel/{blog}', [LaravelController::class, 'show'])->name('laravel.show');

Route::get('/admin',[AdminDashboardController::class, '__invoke'])->middleware('auth')->name('admin.dashboard');
Route::get('/admin/create', [AdminDashboardController::class, 'create'])->middleware('auth')->name('admin.create');
Route::post('/admin/blogs/store', [AdminDashboardController::class, 'store'])->middleware('auth')->name('admin.blog.store');

Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show');

Route::post('/blogs/{blog}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comment.store');
Route::delete('/blogs/{blog}/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth')->name('comment.delete');

Route::post('/blogs/{blog}/comments/{comment}/like', [CommentController::class, 'like'])->middleware('auth')->name('comment.like');
 

require __DIR__.'/auth.php';
