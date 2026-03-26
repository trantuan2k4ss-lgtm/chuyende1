<h1>Sửa thông tin sản phẩm</h1>

<form action="/products/{{ $product->id }}" method="POST">
    @csrf
    @method('PUT') <label>tên sản phẩm:</label>
    <input type="text" name="name" value="{{ $product->name }}" required><br><br>

    <label>giá:</label>
    <input type="number" name="price" value="{{ $product->price }}" required><br><br>

    <label>số lượng:</label>
    <input type="number" name="stock" value="{{ $product->stock }}" required><br><br>

    <button type="submit">cập nhật</button>
    <a href="/products">hủy bỏ</a>
</form>