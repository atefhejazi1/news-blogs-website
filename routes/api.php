<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CategoryContrller;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware(EnsureTokenIsValid::class)->group(function () {
    Route::get("categories", [CategoryContrller::class, 'index']);
    Route::post("categories", [CategoryContrller::class, 'store']);
    Route::get("categories/{id}", [CategoryContrller::class, 'show']);
    Route::patch("categories/{id}", [CategoryContrller::class, 'update']);
    Route::delete("categories/{id}", [CategoryContrller::class, 'destroy'])->middleware('auth:sanctum');

    Route::get("blogs", [BlogController::class, 'index']);
    Route::post("blogs", [BlogController::class, 'store']);
    Route::get("blogs/{id}", [BlogController::class, 'show']);
    Route::patch("blogs/{id}", [BlogController::class, 'update']);
    Route::delete("blogs/{id}", [BlogController::class, 'destroy']);

    Route::post("/register", [AuthController::class, 'register']);
    Route::post("/login", [AuthController::class, 'login']);
    Route::post("/logout", [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get("/user", [AuthController::class, 'user'])->middleware('auth:sanctum');
});
