<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/category', CategoryController::class)->except(['edit', 'create']);
Route::resource('/product', ProductController::class)->except(['edit', 'create']);
Route::get('/product/{product}/category/{category}', [ProductController::class, 'attachCategory']);
Route::post('/product/{product}/category', [ProductController::class, 'attachCategories']);
Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index'); // Получить все посты
    Route::post('/', [PostController::class, 'store'])->name('posts.store'); // Создать новый пост
    Route::get('/{id}', [PostController::class, 'show'])->name('posts.show'); // Получить пост по ID
    Route::put('/{id}', [PostController::class, 'update'])->name('posts.update'); // Обновить пост
    Route::delete('/{id}', [PostController::class, 'destroy'])->name('posts.destroy'); // Удалить пост
});

Route::prefix('comments')->group(function () {
    Route::get('/{postId}', [CommentController::class, 'index'])->name('comments.index'); // Получить все комментарии для поста
    Route::post('/', [CommentController::class, 'store'])->name('comments.store'); // Создать новый комментарий
    Route::get('/comment/{id}', [CommentController::class, 'show'])->name('comments.show'); // Получить комментарий по ID
    Route::put('/comment/{id}', [CommentController::class, 'update'])->name('comments.update'); // Обновить комментарий
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comments.destroy'); // Удалить комментарий
});

//Route::get('/product', [ProductController::class, 'index'])->name('product.index');
//Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
//Route::post('/product', [ProductController::class, 'store'])->name('product.store');
//Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
//Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

