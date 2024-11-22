<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/category', CategoryController::class)->except(['edit', 'create']);
Route::resource('/product', ProductController::class)->except(['edit', 'create']);