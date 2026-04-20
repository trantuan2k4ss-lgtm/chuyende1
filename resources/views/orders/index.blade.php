@extends('layout.master')

@section('title', 'Đơn hàng')

@section('content')

<h3 class="mb-4">Quản lý đơn hàng</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Khách</th>
            <th>SĐT</th>
            <th>Tổng</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $o)
        <tr>
            <td>{{ $o->id }}</td>
            <td>{{ $o->receiver_name }}</td>
            <td>{{ $o->phone }}</td>
            <td>{{ number_format($o->total_price - $o->discount_amount) }}đ</td>

            <td>
                <form action="{{ route('orders.update', $o) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <select name="status" onchange="this.form.submit()" class="form-select">

                        <option value="cho_xac_nhan" {{ $o->status=='cho_xac_nhan'?'selected':'' }}>Chờ xác nhận</option>
                        <option value="da_xac_nhan" {{ $o->status=='da_xac_nhan'?'selected':'' }}>Đã xác nhận</option>
                        <option value="dang_giao" {{ $o->status=='dang_giao'?'selected':'' }}>Đang giao</option>
                        <option value="hoan_thanh" {{ $o->status=='hoan_thanh'?'selected':'' }}>Hoàn thành</option>
                        <option value="da_huy" {{ $o->status=='da_huy'?'selected':'' }}>Đã hủy</option>

                    </select>
                </form>
            </td>

            <td>
                <a href="{{ route('orders.show', $o) }}" class="btn btn-dark btn-sm">
                    Xem
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $orders->links() }}

@endsection