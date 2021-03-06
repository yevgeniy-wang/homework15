<?php

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

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');

Route::get('/posts/author/{id}', [\App\Http\Controllers\Post\PostController::class, 'author'])->name('posts-by-author');
Route::get('/posts/category/{id}', [\App\Http\Controllers\Post\PostController::class, 'category'])->name('posts-by-category');
Route::get('/posts/tag/{id}', [\App\Http\Controllers\Post\PostController::class, 'tag'])->name('posts-by-tag');
Route::get('/posts/author/{author}/category/{category}', [\App\Http\Controllers\Post\PostController::class, 'authorAndCategory'])->name('posts-by-author-category');
Route::get('/posts/author/{author}/category/{category}/tag/{tag}', [\App\Http\Controllers\Post\PostController::class, 'authorAndCategoryAndTag'])->name('posts-by-author-category-tag');



Route::middleware('guest')->group(function (){
    Route::get('/auth/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/auth/login', [\App\Http\Controllers\AuthController::class, 'handleLogin'])->name('handle-login');
});

Route::middleware('auth')->group(function (){
    Route::get('/admin', \App\Http\Controllers\AdminController::class)->name('admin');

    Route::get('/posts', [\App\Http\Controllers\Post\PostController::class, 'list'])->name('posts');
    Route::get('/posts/create', [\App\Http\Controllers\Post\PostController::class, 'create'])->name('post-create');
    Route::post('/posts/create', [\App\Http\Controllers\Post\PostController::class, 'store'])->name('post-store');
    Route::get('/posts/{post}/edit', [\App\Http\Controllers\Post\PostController::class, 'edit'])->name('post-edit');
    Route::post('/posts/{post}/edit', [\App\Http\Controllers\Post\PostController::class, 'update'])->name('post-update');
    Route::get('/posts/{post}/destroy', [\App\Http\Controllers\Post\PostController::class, 'destroy'])->name('post-destroy');

    Route::get('/tags', [\App\Http\Controllers\Tag\TagController::class, 'list'])->name('tags');
    Route::get('/tags/create', [\App\Http\Controllers\Tag\TagController::class, 'create'])->name('tag-create');
    Route::post('/tags/create', [\App\Http\Controllers\Tag\TagController::class, 'store'])->name('tag-store');
    Route::get('/tags/{tag}/edit', [\App\Http\Controllers\Tag\TagController::class, 'edit'])->name('tag-edit');
    Route::post('/tags/{tag}/edit', [\App\Http\Controllers\Tag\TagController::class, 'update'])->name('tag-update');
    Route::get('/tags/{tag}/destroy', [\App\Http\Controllers\Tag\TagController::class, 'destroy'])->name('tag-destroy');

    Route::get('/categories', [\App\Http\Controllers\Category\CategoryController::class, 'list'])->name('categories');
    Route::get('/categories/create', [\App\Http\Controllers\Category\CategoryController::class, 'create'])->name('category-create');
    Route::post('/categories/create', [\App\Http\Controllers\Category\CategoryController::class, 'store'])->name('category-store');
    Route::get('/categories/{category}/edit', [\App\Http\Controllers\Category\CategoryController::class, 'edit'])->name('category-edit');
    Route::post('/categories/{category}/edit', [\App\Http\Controllers\Category\CategoryController::class, 'update'])->name('category-update');
    Route::get('/categories/{category}/destroy', [\App\Http\Controllers\Category\CategoryController::class, 'destroy'])->name('category-destroy');

    Route::get('/auth/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});


