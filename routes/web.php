<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class)
        ->middlewareFor(['index', 'show'], 'permission:category-list')
        ->middlewareFor(['create', 'store'], 'permission:category-create')
        ->middlewareFor(['edit', 'update'], 'permission:category-edit')
        ->middlewareFor('destroy', 'permission:category-delete');

    Route::resource('blogs', BlogController::class)
        ->middlewareFor(['index', 'show'], 'permission:blog-list')
        ->middlewareFor(['create', 'store'], 'permission:blog-create')
        ->middlewareFor(['edit', 'update'], 'permission:blog-edit')
        ->middlewareFor('destroy', 'permission:blog-delete');

    Route::resource('roles', RoleController::class)
        ->middlewareFor(['index', 'show'], 'permission:role-list')
        ->middlewareFor(['create', 'store'], 'permission:role-create')
        ->middlewareFor(['edit', 'update'], 'permission:role-edit')
        ->middlewareFor('destroy', 'permission:role-delete');

    Route::resource('users', UserController::class)
        ->middlewareFor(['index', 'show'], 'permission:user-list')
        ->middlewareFor(['create', 'store'], 'permission:user-create')
        ->middlewareFor(['edit', 'update'], 'permission:user-edit')
        ->middlewareFor('destroy', 'permission:user-delete');
});

Route::get("/all-posts", [PostController::class, "index"]);


require __DIR__ . '/auth.php';
