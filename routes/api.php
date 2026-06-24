<?php

use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CategoryContrller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("categories", [CategoryContrller::class, 'index']);
Route::post("categories", [CategoryContrller::class, 'store']);
Route::get("categories/{id}", [CategoryContrller::class, 'show']);
Route::patch("categories/{id}", [CategoryContrller::class, 'update']);
Route::delete("categories/{id}", [CategoryContrller::class, 'destroy']);

Route::get("blogs", [BlogController::class, 'index']);
Route::post("blogs", [BlogController::class, 'store']);
Route::get("blogs/{id}", [BlogController::class, 'show']);
Route::patch("blogs/{id}", [BlogController::class, 'update']);
Route::delete("blogs/{id}", [BlogController::class, 'destroy']);
