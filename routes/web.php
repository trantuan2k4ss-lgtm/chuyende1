<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes - Dự án Quản lý Quần áo (Khải Tuấn)
|--------------------------------------------------------------------------
*/

// 1. Trang chủ: Tự động chuyển hướng sang trang danh sách sản phẩm
Route::get('/', function () {
    return redirect('/san-pham');
});

// 2. Hiển thị danh sách sản phẩm (Gọi hàm index trong ProductController)
Route::get('/san-pham', [ProductController::class, 'index']);

// 3. Xử lý thêm sản phẩm mới (Gọi hàm store trong ProductController)
Route::post('/them-san-pham', [ProductController::class, 'store']);

// 4. Xử lý xóa sản phẩm theo ID (Gọi hàm destroy trong ProductController)
Route::get('/xoa-san-pham/{id}', [ProductController::class, 'destroy']);