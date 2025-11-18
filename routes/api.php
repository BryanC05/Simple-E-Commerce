<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TransactionController;

// Rute Produk (Otomatis membuat GET, POST, PUT, DELETE)
Route::apiResource('products', ProductController::class);

// Rute Transaksi (Hanya POST)
Route::post('transactions', [TransactionController::class, 'store']);