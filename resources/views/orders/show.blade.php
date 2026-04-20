@extends('layout.master')

@section('title', 'Chi tiết đơn')

@section('content')

<h3 class="mb-4">Chi tiết đơn #{{ $order->id }}</h3>

<div class="card p-3 mb-4">
    <h5>Thông tin khách</h5>
    <p><b>Tên:</b> {{ $order->receiver_name }}</p>
    <p><b>SĐT:</b> {{ $order->phone }}</p>
    <p><b>Địa chỉ:</b> {{ $order->address }}</p>
</div>

<div class="card p-3 mb-4">
    <h5>Sản phẩm</h5>

    <table class="table">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Giá</th>
                <th>SL</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ number_format($item->price) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price * $item->quantity) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="card p-3">
    <h5>Tổng tiền</h5>

    <p>Tổng: {{ number_format($order->total_price) }}đ</p>
    <p>Giảm: {{ number_format($order->discount_amount) }}đ</p>
    <p><b>Thực thu: {{ number_format($order->total_price - $order->discount_amount) }}đ</b></p>
</div>

@endsection