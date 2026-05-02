@extends('layout.master')

@section('title', 'Quản lý danh mục')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Quản lý danh mục</h2>
            <p class="text-muted mb-0">Danh sách các danh mục sản phẩm trong cửa hàng</p>
        </div>

        <a href="{{ route('categories.create') }}" class="btn btn-dark rounded-pill px-4 py-2">
            + Thêm danh mục
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success rounded-4 border-0 shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th>Tên danh mục</th>
                        <th>Slug</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th class="text-end pe-4">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td class="px-4">{{ $category->id }}</td>
                        <td>
                            <div class="fw-semibold">{{ $category->name }}</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                {{ $category->slug }}
                            </span>
                        </td>
                        <td class="text-muted">
                            {{ $category->description ?? 'Không có mô tả' }}
                        </td>
                        <td>
                            @if($category->status == 'hien')
                            <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                Hiển thị
                            </span>
                            @else
                            <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3 py-2">
                                Ẩn
                            </span>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('categories.edit', $category) }}"
                                class="btn btn-warning btn-sm rounded-pill px-3">
                                Sửa
                            </a>

                            <form action="{{ route('categories.destroy', $category) }}"
                                method="POST"
                                class="d-inline-block"
                                onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm rounded-pill px-3">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            Chưa có danh mục nào.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
</div>
@endsection
