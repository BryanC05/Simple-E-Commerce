<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products-view', function () {
    $products = Product::all();
    
    return view('product.index', compact('products'));
});

Route::get('/', function () {
    return redirect('/products-view');
});
