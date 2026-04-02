<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    // Khai báo tên bảng thực tế trong Database
    protected $table = 'sanpham';

    // Các cột mà Tuấn đã tạo trong phpMyAdmin (ID, TenSP, SoLuong, Gia)
    protected $fillable = ['TenSP', 'SoLuong', 'Gia'];

    // Nếu bảng của bạn không có 2 cột created_at và updated_at thì thêm dòng này:
    public $timestamps = false;
}