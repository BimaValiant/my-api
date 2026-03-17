<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;

// --- Route Public (Bisa diakses siapa saja tanpa login) ---
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// --- Route Private (Harus bawa Token / Sudah Login) ---
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // CRUD Produk & Kategori kita masukkan ke dalam kurung kurawal ini
    Route::apiResource('/categories', CategoryController::class);   
    Route::apiResource('/products', ProductController::class);
});