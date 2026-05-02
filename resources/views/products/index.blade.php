@extends('layout.master')

@section('title', 'Sản phẩm')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Sản phẩm</h3>
    <a href="{{ route('products.create') }}" class="btn btn-dark">+ Thêm</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Kho</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>
                @if($p->image)
                <img src="{{ asset('storage/'.$p->image) }}" width="60">
                @endif
            </td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->category->name }}</td>
            <td>{{ number_format($p->price) }}</td>
            <td>{{ $p->stock }}</td>
            <td>
                <a href="{{ route('products.edit', $p) }}" class="btn btn-warning btn-sm">Sửa</a>

                <form action="{{ route('products.destroy', $p) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links() }}
@endsection