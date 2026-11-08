<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\OrderController;

// ==========================================
// PUBLIC ROUTES
// ==========================================

// API Test
Route::get('/test', function () {
    return response()->json([
        'message' => 'API is working!'
    ]);
});

// Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Categories
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);


// ==========================================
// PRIVATE ROUTES
// Authentication required
// ==========================================

Route::middleware('auth:sanctum')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // ======================================
    // PRODUCT ROUTES
    // ======================================

    // Admin and User can view products
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{product}', [ProductController::class, 'show']);

    // Only Admin can create, update, and delete
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::patch('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);

    // Cart
    Route::apiResource('cart', CartItemController::class);

    // Payments
    Route::apiResource('payments', PaymentController::class);

    // Addresses
    Route::apiResource('addresses', AddressController::class);

    // Orders
    Route::apiResource('orders', OrderController::class);
});
