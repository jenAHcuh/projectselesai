<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExperimentController;
use App\Http\Controllers\CartController;

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::get('/task', function () {
    return view('task');
})->name('task');

Route::get('/calibration', function () {
    return view('calibration');
})->name('calibration');

Route::post('/experiment/start', [ExperimentController::class, 'start'])
    ->name('experiment.start');

// Route::get('/home', function () {
//     return view('home');
// })->name('home');

Route::get('/shop', [ProductController::class, 'index'])
    ->name('shop.index');

Route::get('/products/{slug}', [ProductController::class, 'show'])
    ->name('products.show');

// Cart
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/add/{slug}', [CartController::class, 'add'])
    ->name('cart.add');