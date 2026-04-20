@extends('client.layout')

@section('content')

<div class="bg-gray-50 min-h-screen py-12">

    <div class="max-w-6xl mx-auto px-6">

        <h1 class="text-2xl font-bold mb-8">
            Giỏ hàng
        </h1>

        {{-- EMPTY --}}
        @if(empty($cart))

        <div class="bg-white p-10 text-center rounded-xl border">
            <image
                src="https://tokyolife.vn/images/cart/oops.svg"
                class=" object-contain mx-auto mb-6"
                alt="Empty Cart">
                <p class="text-gray-500 mb-4">Bạn chưa có sản phẩm nào trong giỏ hàng.


                </p>

                <a href="/"
                    class="bg-black text-white px-6 py-3 rounded-lg inline-block">
                    Tiếp tục mua hàng
                </a>
        </div>

        @else

        <form action="{{ route('cart.update') }}" method="POST">
            @csrf

            <div class="bg-white rounded-xl border overflow-hidden">

                @php $total = 0; @endphp

                {{-- HEADER --}}
                <div class="grid grid-cols-12 px-6 py-4 border-b text-sm text-gray-500">
                    <div class="col-span-6">Sản phẩm</div>
                    <div class="col-span-2 text-center">Giá</div>
                    <div class="col-span-2 text-center">Số lượng</div>
                    <div class="col-span-2 text-right">Tổng</div>
                </div>

                {{-- ITEMS --}}
                @foreach($cart as $id => $item)

                @php
                $sub = $item['price'] * $item['quantity'];
                $total += $sub;
                @endphp

                <div class="grid grid-cols-12 items-center px-6 py-5 border-b">

                    {{-- PRODUCT --}}
                    <div class="col-span-6 flex items-center gap-4">

                        <img src="{{ asset('storage/'.$item['image']) }}"
                            class="w-20 h-20 object-cover rounded-lg border">

                        <div>
                            <p class="font-medium">
                                {{ $item['name'] }}
                            </p>

                            <a href="{{ route('cart.remove', $id) }}"
                                class="text-sm text-red-500 hover:underline">
                                Xoá
                            </a>
                        </div>

                    </div>

                    {{-- PRICE --}}
                    <div class="col-span-2 text-center">
                        {{ number_format($item['price']) }}đ
                    </div>

                    {{-- QTY --}}
                    <div class="col-span-2 text-center">
                        <input type="number"
                            name="quantities[{{ $id }}]"
                            value="{{ $item['quantity'] }}"
                            min="1"
                            class="w-16 border text-center rounded">
                    </div>

                    {{-- SUBTOTAL --}}
                    <div class="col-span-2 text-right font-semibold">
                        {{ number_format($sub) }}đ
                    </div>

                </div>

                @endforeach

            </div>

            {{-- ACTION --}}
            <div class="flex justify-between items-center mt-8">

                <a href="/"
                    class="text-gray-600 hover:underline">
                    ← Tiếp tục mua
                </a>

                <button class="bg-gray-200 px-6 py-2 rounded hover:bg-gray-300">
                    Cập nhật
                </button>

            </div>

        </form>

        {{-- TOTAL --}}
        <div class="mt-8 flex justify-end">

            <div class="bg-white border rounded-xl p-6 w-full md:w-96">

                <h3 class="text-lg font-semibold mb-4">
                    Tổng giỏ hàng
                </h3>

                <div class="flex justify-between mb-2">
                    <span>Tạm tính</span>
                    <span>{{ number_format($total) }}đ</span>
                </div>

                <div class="flex justify-between font-bold text-lg border-t pt-3 mt-3">
                    <span>Tổng</span>
                    <span class="text-red-600">
                        {{ number_format($total) }}đ
                    </span>
                </div>

                <button class="w-full mt-6 bg-black text-white py-3 rounded-lg hover:bg-gray-800">
                    Thanh toán
                </button>

            </div>

        </div>

        @endif

    </div>
</div>

@endsection