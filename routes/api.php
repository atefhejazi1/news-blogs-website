<?php

use App\Http\Controllers\API\CategoryContrller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("categories", [CategoryContrller::class, 'index']);
