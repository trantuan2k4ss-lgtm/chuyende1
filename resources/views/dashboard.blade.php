@extends('layout.master')

@section('title', 'Dashboard')

@section('content')

<style>
    .hover-row:hover {
        background-color: #f8f9fa;
        transition: 0.2s;
        cursor: pointer;
    }
</style>

<div class="container-fluid">

    {{-- TOP STATS --}}
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <small class="text-muted">Tổng sản phẩm</small>
                <h4 class="fw-bold mb-0">{{ $totalProducts ?? 0 }}</h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <small class="text-muted">Danh mục</small>
                <h4 class="fw-bold mb-0">{{ $totalCategories ?? 0 }}</h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <small class="text-muted">Đơn hàng</small>
                <h4 class="fw-bold mb-0">{{ $totalOrders ?? 0 }}</h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <small class="text-muted">Lợi nhuận</small>
                <h4 class="fw-bold mb-0">{{ number_format($profit ?? 0) }}đ</h4>
            </div>
        </div>
    </div>

    {{-- MAIN --}}
    <div class="row g-4">

        {{-- LEFT: ORDERS --}}
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
                                <th>Ngày</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestOrders as $order)

                            @php
                            $statusClass = match($order->status) {
                            'hoan_thanh' => 'bg-success',
                            'dang_xu_ly' => 'bg-warning text-dark',
                            'da_huy' => 'bg-danger',
                            default => 'bg-secondary'
                            };
                            @endphp

                            <tr class="hover-row"
                                onclick="window.location='{{ route('orders.show', $order->id) }}'">

                                <td>{{ $order->id }}</td>
                                <td>{{ $order->receiver_name }}</td>
                                <td>{{ number_format($order->total_price) }}đ</td>

                                <td>
                                    <span class="badge {{ $statusClass }}">
                                        {{ $order->status }}
                                    </span>
                                </td>

                                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Không có dữ liệu
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="col-lg-4 d-flex flex-column gap-4">

            {{-- LOW STOCK --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3 text-danger">Sắp hết hàng</h5>

                    @forelse($lowStockProducts as $p)
                    <div class="d-flex justify-content-between border-bottom py-2">

                        <a href="{{ route('products.edit', $p->id) }}"
                            class="text-decoration-none text-dark">
                            {{ $p->name }}
                        </a>

                        <span class="fw-bold {{ $p->stock <= 2 ? 'text-danger' : 'text-warning' }}">
                            {{ $p->stock }}
                        </span>
                    </div>
                    @empty
                    <p class="text-muted">Không có sản phẩm</p>
                    @endforelse
                </div>
            </div>

            {{-- NEW PRODUCTS --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Sản phẩm mới</h5>

                    <ul class="list-group list-group-flush">
                        @forelse($latestProducts as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">

                            <a href="{{ route('products.edit', $product->id) }}"
                                class="text-decoration-none text-dark">
                                {{ $product->name }}
                            </a>

                            <span class="text-muted">
                                {{ number_format($product->price) }}đ
                            </span>
                        </li>
                        @empty
                        <li class="list-group-item text-muted">
                            Không có dữ liệu
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection