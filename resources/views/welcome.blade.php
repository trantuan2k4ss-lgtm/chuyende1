<!DOCTYPE html>
<h1>Quản lý bán quần áo</h1>

<form action="/products" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Tên sản phẩm" required>
    <input type="number" name="price" placeholder="Giá" required>
    <input type="number" name="stock" placeholder="Số lượng" required>
    <button type="submit">Thêm mới</button>
</form>

<hr>

<table border="1">
    <tr>
        <th>Tên</th>
        <th>Giá</th>
        <th>Kho</th>
        <th>Hành động</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->stock }}</td>
        <td>
            <form action="/products/{{ $product->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Xóa</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>