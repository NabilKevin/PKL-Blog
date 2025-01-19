<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware('checkGuest')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/about', [AboutController::class, 'index']);
    Route::get('/posts', [BlogController::class, 'index']);
    Route::get('/post/{slug}', [BlogController::class, 'show']);
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/admin/posts', [AdminController::class, 'posts']);
    Route::get('/admin/create', [BlogController::class, 'create'])->name('create');
    Route::get('/admin/edit/{slug}', [BlogController::class, 'edit']);
    Route::post('/admin/update/{slug}', [BlogController::class, 'update']);
    Route::post('/admin/create', [BlogController::class, 'store']);
    Route::post('/admin/delete/{slug}', [BlogController::class, 'destroy']);
    Route::get('/admin/create/slug', [BlogController::class, 'checkSlug']);
});

Route::get('/search', [BlogController::class, 'search']);
