@extends('layout.master')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content')
<div class="container">

    <h3 class="mb-4">Chỉnh sửa sản phẩm</h3>

    <form method="POST"
        action="{{ route('products.update', $product) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            {{-- LEFT --}}
            <div class="col-md-8">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tên sản phẩm *</label>
                    <input type="text" name="name" class="form-control"
                        placeholder="VD: Áo thun nam"
                        value="{{ old('name', $product->name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Mô tả</label>
                    <textarea name="description" class="form-control" rows="4"
                        placeholder="Mô tả sản phẩm...">{{ old('description', $product->description) }}</textarea>
                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-md-4">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Danh mục *</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $c)
                        <option value="{{ $c->id }}"
                            {{ $product->category_id == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Giá *</label>
                    <input type="number" name="price" class="form-control"
                        placeholder="0"
                        value="{{ old('price', $product->price) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Giá giảm</label>
                    <input type="number" name="sale_price" class="form-control"
                        placeholder="Không bắt buộc"
                        value="{{ old('sale_price', $product->sale_price) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kho *</label>
                    <input type="number" name="stock" class="form-control"
                        value="{{ old('stock', $product->stock) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Giới tính</label>
                    <select name="gender" class="form-control">
                        <option value="nam" {{ $product->gender == 'nam' ? 'selected' : '' }}>Nam</option>
                        <option value="nu" {{ $product->gender == 'nu' ? 'selected' : '' }}>Nữ</option>
                        <option value="tre_em" {{ $product->gender == 'tre_em' ? 'selected' : '' }}>Trẻ em</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Size</label>
                    <input type="text" name="size" class="form-control"
                        placeholder="S, M, L..."
                        value="{{ old('size', $product->size) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Màu</label>
                    <input type="text" name="color" class="form-control"
                        placeholder="Đỏ, Đen..."
                        value="{{ old('color', $product->color) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="hien" {{ $product->status == 'hien' ? 'selected' : '' }}>Hiện</option>
                        <option value="an" {{ $product->status == 'an' ? 'selected' : '' }}>Ẩn</option>
                    </select>
                </div>

            </div>

        </div>

        {{-- IMAGE --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Ảnh sản phẩm</label>

            @if($product->image)
            <div class="mb-2">
                <img src="{{ asset('storage/'.$product->image) }}"
                    width="120" class="rounded shadow">
            </div>
            @endif

            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label>Thêm ảnh</label>
            <input type="file" name="images[]" multiple class="form-control">
        </div>

        {{-- hiển thị ảnh cũ --}}
        <div class="d-flex gap-2 flex-wrap">
            @foreach($product->images as $img)
            <img src="{{ asset('storage/'.$img->image) }}" width="80">
            @endforeach
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                Quay lại
            </a>

            <button class="btn btn-dark">
                Cập nhật sản phẩm
            </button>
        </div>

    </form>
</div>
@endsection