<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('layouts.blog');
//});
Route::get('/', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/post/{id}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');
    Route::delete('/posts', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    Route::patch('/posts/edit/{id}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::get('/posts/edit/{id}', [\App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::get('/posts/add', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/posts/add', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');



    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
    Route::delete('/categories', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
    Route::patch('/categories/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::get('/categories/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/categories/add', [\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories/add', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
});

require __DIR__.'/auth.php';
