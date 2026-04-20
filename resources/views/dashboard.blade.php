@extends('layout.master')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Tổng sản phẩm</small>
                        <h4 class="fw-bold mb-0">{{ $totalProducts ?? 0 }}</h4>
                    </div>
                    <i class="bi bi-box fs-2 text-primary"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Danh mục</small>
                        <h4 class="fw-bold mb-0">{{ $totalCategories ?? 0 }}</h4>
                    </div>
                    <i class="bi bi-grid fs-2 text-success"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Đơn hàng</small>
                        <h4 class="fw-bold mb-0">{{ $totalOrders ?? 0 }}</h4>
                    </div>
                    <i class="bi bi-receipt fs-2 text-warning"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Doanh thu</small>
                        <h4 class="fw-bold mb-0">{{ number_format($revenue ?? 0) }}đ</h4>
                    </div>
                    <i class="bi bi-cash-stack fs-2 text-danger"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Đơn hàng gần đây</h5>

                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Khách</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestOrders ?? [] as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                {{ number_format($order->total_price) }}đ
                                <td>
                                    <span class="badge bg-primary">{{ $order->status }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Chưa có dữ liệu</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Sản phẩm mới</h5>

                    <ul class="list-group list-group-flush">
                        @forelse($latestProducts ?? [] as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $product->name }}</span>
                            <span class="text-muted">{{ number_format($product->price) }}đ</span>
                        </li>
                        @empty
                        <li class="list-group-item text-muted">Không có dữ liệu</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection