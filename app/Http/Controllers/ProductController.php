<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham; // Nhớ gọi Model SanPham của bạn

class ProductController extends Controller
{
    // 1. Hiển thị danh sách
   public function index() {
    // Lấy dữ liệu và phân trang, mỗi trang 5 dòng
    $ds_sanpham = SanPham::paginate(5);
    
    return view('danh_sach', compact('ds_sanpham'));
}

    // 2. Xử lý thêm sản phẩm mới + Validation
    public function store(Request $request) {
    $request->validate([
        'name' => 'required|min:3',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'category' => 'required',
    ]);

    SanPham::create($request->all());
    return redirect()->back()->with('success', 'Đã thêm vào kho products!');
}

    // 3. Xử lý xóa sản phẩm
    public function destroy($id) {
        SanPham::where('ID', $id)->delete();
        return redirect()->back()->with('success', 'Đã xóa sản phẩm thành công!');
    }
}