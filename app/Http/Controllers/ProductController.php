<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. Hiển thị danh sách sản phẩm
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // 2. Lưu sản phẩm mới
    public function store(Request $request) {
        Product::create($request->all());
        return redirect()->back()->with('success', 'Thêm mới thành công!');
    }

    // 3. Hiển thị trang sửa (Lấy thông tin cũ ra form)
    public function edit($id) {
        $product = Product::findOrFail($id); // Dùng findOrFail để tránh lỗi nếu ID không tồn tại
        return view('products.edit', compact('product'));
    }

    // 4. Cập nhật dữ liệu vào Database
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect('/products')->with('success', 'Cập nhật thành column!');
    }

    // 5. Xóa sản phẩm
    public function destroy($id) {
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Đã xóa sản phẩm!');
    }
}