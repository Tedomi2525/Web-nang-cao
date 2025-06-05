<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;

// Trang chính
Route::get('/', function () {
    return view('index');
});

// Giỏ hàng
Route::get('/cart', function () {
    $cart_data = session('cart', []);
    return view('cart', compact('cart_data'));
});

// Trang thanh toán (hiển thị form + giỏ hàng)
Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment/submit', [PaymentController::class, 'submitPayment'])->name('payment.submit');
Route::get('/order-success', function () {
    return view('order_success');
});

// Các trang tĩnh
Route::get('/contact', fn() => view('contact'));
Route::get('/introduce', fn() => view('introduce'));

// Sản phẩm
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Giỏ hàng - xử lý thêm, tăng, giảm, xóa
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/increase/{id}', [CartController::class, 'increaseQuantity']);
Route::post('/cart/decrease/{id}', [CartController::class, 'decreaseQuantity']);
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart']);

// Cần đăng nhập
Route::middleware('auth')->group(function () {
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});

require __DIR__.'/auth.php';
