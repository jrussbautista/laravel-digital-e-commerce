<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/products/{product:slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('products.show');

Route::get('/products/downloads/{product:slug}', [\App\Http\Controllers\ProductDownloadController::class, 'show'])->name('products.downloads.show')->middleware('auth');

Route::post('/cart/products', [\App\Http\Controllers\CartProductController::class, 'store'])->name('cart.products.store');
Route::delete('/cart/products/{product}', [\App\Http\Controllers\CartProductController::class, 'destroy'])->name('cart.products.destroy');

Route::get('/cart',  [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');

Route::get('/checkout',  [\App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index')->middleware('auth');

Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index')->middleware('auth');


Route::post('/stripe/webhook',  [\App\Http\Controllers\StripeWebHookController::class, 'handleWebhook']);


require __DIR__.'/auth.php';
