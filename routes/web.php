<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;


use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\VoucherClientController;

use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\ProfileController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'update']);
    Route::get('/profile/order', [ProfileController::class, 'orders']);
});

// CLIENT
Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index']);
Route::get('/product/{slug}', [\App\Http\Controllers\Client\ProductController::class, 'show'])->name('product.detail');;

Route::prefix('cart')->group(function () {

    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::get('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

Route::post('/voucher/apply', [VoucherClientController::class, 'apply'])->name('voucher.apply');

// nhóm admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class)->only(['index', 'show', 'update']);
    Route::resource('vouchers', VoucherController::class);
    Route::resource('users', UserController::class);
});


Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
