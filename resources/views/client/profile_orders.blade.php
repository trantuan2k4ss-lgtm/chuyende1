@extends('client.layout')

@section('content')

<div class="max-w-6xl mx-auto py-10 px-4">

    <h2 class="text-2xl font-bold mb-6">
        Đơn hàng của tôi
    </h2>

    @forelse($orders as $o)

    <div class="bg-white rounded-xl border p-5 mb-4 shadow-sm">

        <div class="flex justify-between mb-3">
            <span class="font-semibold">Mã đơn: #{{ $o->id }}</span>

            <span class="text-sm px-3 py-1 rounded-full
                @if($o->status == 'cho_xac_nhan') bg-yellow-100 text-yellow-600
                @elseif($o->status == 'dang_giao') bg-blue-100 text-blue-600
                @elseif($o->status == 'hoan_thanh') bg-green-100 text-green-600
                @else bg-red-100 text-red-600
                @endif
            ">
                {{ $o->status }}
            </span>
        </div>

        <p class="text-sm text-gray-500 mb-2">
            Người nhận: {{ $o->receiver_name }}
        </p>

        <p class="text-sm text-gray-500 mb-2">
            SĐT: {{ $o->phone }}
        </p>

        <p class="text-sm text-gray-500 mb-3">
            Địa chỉ: {{ $o->address }}
        </p>

        <div class="flex justify-between items-center border-t pt-3">

            <span class="text-sm text-gray-500">
                {{ $o->created_at->format('d/m/Y H:i') }}
            </span>

            <span class="text-red-600 font-bold">
                {{ number_format($o->total_price) }}đ
            </span>

        </div>

    </div>

    @empty
    <p class="text-gray-500 text-center">
        Bạn chưa có đơn hàng nào
    </p>
    @endforelse

</div>

@endsection