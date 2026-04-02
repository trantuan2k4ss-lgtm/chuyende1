<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham; // Nhớ gọi Model SanPham của bạn

class ProductController extends Controller
{
    // 1. Hiển thị danh sách
    public function index() {
        $ds_sanpham = SanPham::all();
        return view('danh_sach', compact('ds_sanpham'));
    }

    // 2. Xử lý thêm sản phẩm mới + Validation
    public function store(Request $request) {
        $request->validate([
            'TenSP' => 'required|min:3',
            'SoLuong' => 'required|numeric|min:1',
            'Gia' => 'required|numeric|min:1000',
        ]);

        SanPham::create($request->all());
        return redirect()->back()->with('success', 'Đã thêm sản phẩm mới!');
    }

    // 3. Xử lý xóa sản phẩm
    public function destroy($id) {
        SanPham::where('ID', $id)->delete();
        return redirect()->back()->with('success', 'Đã xóa sản phẩm thành công!');
    }
}