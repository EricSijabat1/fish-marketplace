<?php
// routes/web.php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\PageController; // <-- Tambahkan ini
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route untuk landing page baru kita
Route::get('/', [PageController::class, 'home'])->name('home');

// Route untuk daftar semua produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Auth::routes();

// ... sisa route lainnya tetap sama
Route::middleware(['auth'])->group(function () {
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    Route::prefix('seller')->name('seller.')->middleware('can:seller')->group(function () {
        Route::get('/products', [SellerController::class, 'products'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/orders', [SellerController::class, 'orders'])->name('orders.index');
    });
});
