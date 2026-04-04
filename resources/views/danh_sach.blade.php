<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Sản phẩm - Khải Tuấn</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f2f5; margin: 0; padding: 20px; display: flex; justify-content: center; }
        .main-layout { display: grid; grid-template-columns: 300px 1fr; grid-template-rows: auto 1fr; gap: 20px; max-width: 1200px; width: 100%; height: 90vh; }

        .section-form { grid-row: 1 / 3; background: white; padding: 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .section-stats { grid-column: 2; background: #6c5ce7; color: white; padding: 20px; border-radius: 15px; display: flex; justify-content: space-between; align-items: center; }
        .section-table { grid-column: 2; background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); overflow-y: auto; }

        h3 { margin-top: 0; color: #2d3436; }
        input, select { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        .btn-add { width: 100%; background: #00b894; color: white; border: none; padding: 12px; border-radius: 8px; cursor: pointer; font-weight: bold; }
        
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; background: #f8f9fa; padding: 15px; color: #636e72; border-bottom: 2px solid #eee; }
        td { padding: 15px; border-bottom: 1px solid #eee; }
        .status-badge { padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; }
        .alert { font-size: 14px; margin: 0; }
    </style>
</head>
<body>

<div class="main-layout">
    <div class="section-form">
        <h3>📦 Thêm sản phẩm</h3>
        <form action="/them-san-pham" method="POST">
            @csrf
            <label>Tên sản phẩm:</label>
            <input type="text" name="name" placeholder="Ví dụ: Áo khoác" required>
            
            <label>Giá bán (VNĐ):</label>
            <input type="number" name="price" placeholder="500000" required>
            
            <label>Số lượng kho:</label>
            <input type="number" name="quantity" placeholder="10" required>
            
            <label>Danh mục:</label>
            <select name="category">
                <option value="Áo">Áo</option>
                <option value="Quần">Quần</option>
                <option value="Phụ kiện">Phụ kiện</option>
            </select>
            
            <button type="submit" class="btn-add">LƯU SẢN PHẨM</button>
        </form>
    </div>

    <div class="section-stats">
        <div>
            <span style="font-size: 1.2em; font-weight: bold;">Hệ thống Products</span>
            <p class="alert">Tổng số mặt hàng: {{ $ds_sanpham->total() }}</p>
        </div>
        @if(session('success'))
            <div style="background: rgba(255,255,255,0.2); padding: 10px 20px; border-radius: 10px;">
                ✅ {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="section-table">
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Kho</th>
                    <th>Phân loại</th>
                    <th style="text-align: center;">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ds_sanpham as $sp)
                <tr>
                    <td><strong>{{ $sp->name }}</strong></td>
                    <td>{{ number_format($sp->price) }}đ</td>
                    <td>{{ $sp->quantity }}</td>
                    <td>
                        <span style="background: #dfe6e9; padding: 4px 8px; border-radius: 5px; font-size: 12px;">
                            {{ $sp->category }}
                        </span>
                    </td>
                    <td style="text-align: center;">
                        @if($sp->quantity < 5)
                            <span class="status-badge" style="background: #fff5f5; color: #d63031; border: 1px solid #feb2b2;">
                                ⚠️ Sắp hết hàng
                            </span>
                        @else
                            <span class="status-badge" style="background: #f0fff4; color: #38a169;">
                                ✅ Còn hàng
                            </span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 25px; display: flex; justify-content: center;">
            {{ $ds_sanpham->links() }}
        </div>
    </div>
</div>

</body>
</html>