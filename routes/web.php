<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// index page route
Route::post('/', [App\Http\Controllers\PageController::class, 'index'])->name('welcome');

//save product route
// Route::post('/save_product', [App\Http\Controllers\ProductController::class, 'store']);

// cart routes
Route::get('/cart', [App\Http\Controllers\PageController::class, 'cart'])->name('cart');
Route::get('/addToCart', [App\Http\Controllers\CartController::class, 'addToCart']);
Route::get('/loadCartCount', [App\Http\Controllers\CartController::class, 'loadCartCount']);
Route::get('/save_order', [App\Http\Controllers\CartController::class, 'save_order']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/addProduct', function () {
    return view('addProduct');
})->middleware(['auth'])->name('addProduct');

require __DIR__.'/auth.php';
