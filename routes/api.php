<?php

use App\Http\Controllers\Api\v0_1\ProductController;
use Illuminate\Support\Facades\Route;

//Route::apiResource('products', ProductController::class);
Route::get("/products", [ProductController::class, 'index'])->name("products.index");
