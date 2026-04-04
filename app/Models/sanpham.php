<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'sanpham';
    protected $primaryKey = 'ID';
    
    // Laravel sẽ tự quản lý cột timestamps nếu bạn đặt tên đúng là created_at/updated_at. 
    // Trong hình bạn đặt là 'timestamps', nên ta tạm tắt tự động để tránh lỗi.
    public $timestamps = false; 

    // Cập nhật danh sách các cột mới
    protected $fillable = ['name', 'price', 'quantity', 'category'];
}