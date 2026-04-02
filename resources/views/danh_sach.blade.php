<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hệ thống Quản lý Quần áo - Khải Tuấn</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; padding: 40px; color: #333; }
        .container { max-width: 900px; margin: auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h2 { color: #2d3436; border-bottom: 2px solid #6c5ce7; padding-bottom: 10px; }
        
        /* Form style */
        .form-group { display: flex; gap: 10px; margin-bottom: 20px; flex-wrap: wrap; }
        input { padding: 10px; border: 1px solid #ddd; border-radius: 6px; flex: 1; min-width: 150px; }
        button { padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600; transition: 0.3s; }
        .btn-add { background-color: #6c5ce7; color: white; }
        .btn-add:hover { background-color: #5849c4; }
        
        /* Table style */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #fcfcfc; color: #636e72; text-transform: uppercase; font-size: 12px; }
        tr:hover { background-color: #f1f2f6; }
        .btn-delete { color: #eb4d4b; text-decoration: none; font-size: 14px; font-weight: bold; }
        
        /* Thông báo */
        .alert { padding: 10px; border-radius: 6px; margin-bottom: 15px; font-size: 14px; }
        .alert-success { background: #d4edda; color: #155724; }
        .alert-error { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class="container">
        <h2>👕 Quản lý kho hàng - Khải Tuấn</h2>

        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
        @if($errors->any()) 
            <div class="alert alert-error">
                @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </div>
        @endif

        <form action="/them-san-pham" method="POST" class="form-group">
            @csrf
            <input type="text" name="TenSP" placeholder="Tên sản phẩm (áo thun, quần...)" value="{{ old('TenSP') }}">
            <input type="number" name="SoLuong" placeholder="SL" value="{{ old('SoLuong') }}">
            <input type="number" name="Gia" placeholder="Giá bán" value="{{ old('Gia') }}">
            <button type="submit" class="btn-add">Thêm mới</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá niêm yết</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ds_sanpham as $sp)
                <tr>
                    <td>#{{ $sp->ID }}</td>
                    <td><strong>{{ $sp->TenSP }}</strong></td>
                    <td>{{ $sp->SoLuong }} cái</td>
                    <td>{{ number_format($sp->Gia) }}đ</td>
                    <td>
                        <a href="/xoa-san-pham/{{ $sp->ID }}" class="btn-delete" onclick="return confirm('Xóa {{ $sp->TenSP }}?')">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>