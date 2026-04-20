@extends('layout.master')

@section('title', 'Thêm danh mục')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5">
                    <div class="mb-4">
                        <h2 class="fw-bold mb-1">Thêm danh mục</h2>
                        <p class="text-muted mb-0">Tạo danh mục mới cho cửa hàng</p>
                    </div>

                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tên danh mục</label>
                            <input type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control rounded-4 p-3 @error('name') is-invalid @enderror"
                                placeholder="Ví dụ: Áo nam">

                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Mô tả</label>
                            <textarea name="description"
                                rows="4"
                                class="form-control rounded-4 p-3 @error('description') is-invalid @enderror"
                                placeholder="Mô tả ngắn về danh mục...">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Trạng thái</label>
                            <select name="status" class="form-select rounded-4 p-3">
                                <option value="hien">Hiển thị</option>
                                <option value="an">Ẩn</option>
                            </select>
                        </div>

                        <div class="d-flex gap-3">
                            <a href="{{ route('categories.index') }}" class="btn btn-light rounded-pill px-4 py-2 border">
                                Quay lại
                            </a>

                            <button type="submit" class="btn btn-dark rounded-pill px-4 py-2">
                                Lưu danh mục
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
