@extends('layout.master')

@section('title', 'Thêm sản phẩm')

@section('content')
<form method="POST"
    action="{{ route('products.store') }}"
    enctype="multipart/form-data">
    @csrf

    <div class="row">

        {{-- LEFT --}}
        <div class="col-md-8">

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Tên sản phẩm <span class="text-danger">*</span>
                </label>
                <input type="text"
                    name="name"
                    class="form-control"
                    placeholder="VD: Áo thun nam"
                    value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Mô tả</label>
                <textarea name="description"
                    class="form-control"
                    rows="4"
                    placeholder="Mô tả sản phẩm...">{{ old('description') }}</textarea>
            </div>

        </div>

        {{-- RIGHT --}}
        <div class="col-md-4">

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Danh mục <span class="text-danger">*</span>
                </label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $c)
                    <option value="{{ $c->id }}"
                        {{ old('category_id') == $c->id ? 'selected' : '' }}>
                        {{ $c->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Giá <span class="text-danger">*</span>
                </label>
                <input type="number"
                    name="price"
                    class="form-control"
                    placeholder="0"
                    value="{{ old('price') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Giá giảm</label>
                <input type="number"
                    name="sale_price"
                    class="form-control"
                    placeholder="Không bắt buộc"
                    value="{{ old('sale_price') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Kho <span class="text-danger">*</span>
                </label>
                <input type="number"
                    name="stock"
                    class="form-control"
                    value="{{ old('stock', 0) }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Giới tính</label>
                <select name="gender" class="form-control">
                    <option value="nam" {{ old('gender') == 'nam' ? 'selected' : '' }}>Nam</option>
                    <option value="nu" {{ old('gender') == 'nu' ? 'selected' : '' }}>Nữ</option>
                    <option value="tre_em" {{ old('gender') == 'tre_em' ? 'selected' : '' }}>Trẻ em</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Size</label>
                <input type="text"
                    name="size"
                    class="form-control"
                    placeholder="S, M, L..."
                    value="{{ old('size') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Màu</label>
                <input type="text"
                    name="color"
                    class="form-control"
                    placeholder="Đỏ, Đen..."
                    value="{{ old('color') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="hien" {{ old('status') == 'hien' ? 'selected' : '' }}>Hiện</option>
                    <option value="an" {{ old('status') == 'an' ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>

        </div>

    </div>

    {{-- IMAGE --}}
    <div class="mb-3">
        <label class="form-label fw-semibold">Ảnh sản phẩm</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="mb-3">
        <label>Ảnh phụ</label>
        <input type="file" name="images[]" multiple class="form-control">
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            Quay lại
        </a>

        <button class="btn btn-dark">
            Thêm sản phẩm
        </button>
    </div>

</form>
@endsection