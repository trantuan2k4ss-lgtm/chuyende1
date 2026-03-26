<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý bán quần áo</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn-add { background: green; color: white; padding: 10px; border: none; cursor: pointer; }
        .btn-delete { background: red; color: white; padding: 5px; border: none; cursor: pointer; }
        .btn-edit { background: blue; color: white; padding: 5px; text-decoration: none; font-size: 13px; }
    </style>
</head>
<body>

    <h1>Trang Quản Lý Sản Phẩm Quần Áo</h1>

    <fieldset>
        <legend>Thêm sản phẩm mới</legend>
        <form action="/products" method="POST">
            @csrf <input type="text" name="name" placeholder="Tên sản phẩm (ví dụ: Áo thun)" required>
            <input type="number" name="price" placeholder="Giá tiền" required>
            <input type="number" name="stock" placeholder="Số lượng trong kho" required>
            <button type="submit" class="btn-add">Thêm mới</button>
        </form>
    </fieldset>

    <hr>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá (VNĐ)</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price) }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="/products/{{ $product->id }}/edit" class="btn-edit">Sửa</a>
                    
                    <form action="/products/{{ $product->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>