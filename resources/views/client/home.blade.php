@extends('client.layout')

@section('content')

{{-- BANNER --}}
<div class="w-full h-[420px] bg-cover bg-center flex items-center justify-center text-white text-4xl font-bold"
    style="background-image: url('https://s3-hni02.higiocloud.vn/gppm2/prod/cms/17732139866031750.jpg')">
</div>

{{-- VOUCHER --}}
<div class="max-w-7xl mx-auto mt-12 px-4">

    <h2 class="text-center text-red-600 text-2xl font-bold mb-8">
        VOUCHER ĐỘC QUYỀN ONLINE
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        @foreach($vouchers as $v)
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition relative flex overflow-hidden">

            {{-- LEFT --}}
            <div class="flex-1 p-5">

                <p class="text-gray-600 text-lg">
                    @if($v->type == 'percent')
                    Giảm đến <span class="text-red-600 font-bold">{{ $v->value }}%</span>
                    @else
                    Giảm ngay <span class="text-red-600 font-bold">{{ number_format($v->value) }}K</span>
                    @endif
                </p>

                <p class="mt-2">
                    Nhập mã
                    <span class="font-bold text-black">
                        {{ strtoupper($v->code) }}
                    </span>
                </p>

                @if($v->min_order)
                <p class="text-gray-500 mt-1">
                    Cho đơn hàng từ {{ number_format($v->min_order) }}đ
                </p>
                @endif

            </div>

            {{-- DASH LINE --}}
            <div class="w-[1px] border-dashed border-r border-gray-300 relative">

                {{-- TOP CIRCLE --}}
                <div class="absolute -top-2 left-1/2 -translate-x-1/2 w-4 h-4 bg-gray-100 rounded-full"></div>

                {{-- BOTTOM CIRCLE --}}
                <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-4 h-4 bg-gray-100 rounded-full"></div>
            </div>

            {{-- RIGHT --}}
            <div class="flex items-center justify-center px-5">
                <button
                    onclick="navigator.clipboard.writeText('{{ $v->code }}')"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm font-semibold">
                    Sao chép mã
                </button>
            </div>

        </div>
        @endforeach

    </div>

</div>

{{-- PRODUCT --}}
<div class="max-w-7xl mx-auto mt-14 px-4">
    <h2 class="text-center text-red-600 text-2xl font-bold mb-8 uppercase">
        Sản phẩm mới
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-6">

        @foreach($products as $p)

        <a href="/product/{{ $p->slug }}" class="group block">

            {{-- IMAGE --}}
            <div class="relative bg-gray-100 overflow-hidden">

                <img src="{{ asset('storage/'.$p->image) }}"
                    class="w-full h-[300px] object-cover group-hover:scale-105 transition">

                {{-- BADGE --}}
                <div class="absolute bottom-0 left-0 w-full bg-red-600 text-white text-xs flex justify-between px-3 py-2">
                    <span>MUA LÀ CÓ QUÀ</span>
                    <span>ĐỘC QUYỀN ONLINE</span>
                </div>

            </div>

            {{-- INFO --}}
            <div class="mt-3">

                {{-- NAME --}}
                <h3 class="text-sm text-gray-800 line-clamp-2 group-hover:text-red-600 transition">
                    {{ $p->name }}
                </h3>

                {{-- PRICE --}}
                <div class="mt-2">

                    @if($p->sale_price)

                    <p class="text-red-600 font-semibold">
                        {{ number_format($p->sale_price) }}đ
                    </p>

                    <div class="flex items-center gap-2 text-sm mt-1">
                        <span class="line-through text-gray-400">
                            {{ number_format($p->price) }}đ
                        </span>

                        <span class="text-red-600 font-semibold">
                            -{{ round((($p->price - $p->sale_price) / $p->price) * 100) }}%
                        </span>
                    </div>

                    @else

                    <p class="text-red-600 font-semibold">
                        {{ number_format($p->price) }}đ
                    </p>

                    @endif

                </div>

            </div>

        </a>

        @endforeach

    </div>
</div>

{{-- SERVICE FEATURES --}}
<div class="bg-gray-100 mt-16 py-12">
    <div class="max-w-7xl mx-auto px-4">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            {{-- ITEM --}}
            <div class="bg-white rounded-xl p-6 text-center shadow hover:shadow-lg transition">

                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-red-600 text-white rounded-full">
                    {{-- ICON --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 9V5a3 3 0 0 0-6 0v4m-2 0h10l1 11H5L6 9z" />
                    </svg>
                </div>

                <h3 class="font-bold text-gray-800 mb-2">
                    HÀNG HOÁ CHẤT LƯỢNG
                </h3>

                <p class="text-gray-500 text-sm">
                    Tận hưởng các mặt hàng chất lượng hàng đầu với giá cả hợp lý
                </p>

            </div>

            {{-- ITEM --}}
            <div class="bg-white rounded-xl p-6 text-center shadow hover:shadow-lg transition">

                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-red-600 text-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 0 1-4-.9L3 17l1.9-3.2A6.978 6.978 0 0 1 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7z" />
                    </svg>
                </div>

                <h3 class="font-bold text-gray-800 mb-2">
                    HỖ TRỢ 24/7
                </h3>

                <p class="text-gray-500 text-sm">
                    Nhận hỗ trợ ngay lập tức bất cứ khi nào bạn cần
                </p>

            </div>

            {{-- ITEM --}}
            <div class="bg-white rounded-xl p-6 text-center shadow hover:shadow-lg transition">

                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-red-600 text-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17V7h6v10m-9 4h12a2 2 0 0 0 2-2V9l-4-4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z" />
                    </svg>
                </div>

                <h3 class="font-bold text-gray-800 mb-2">
                    VẬN CHUYỂN NHANH CHÓNG
                </h3>

                <p class="text-gray-500 text-sm">
                    Tùy chọn giao hàng nhanh chóng và đáng tin cậy
                </p>

            </div>

            {{-- ITEM --}}
            <div class="bg-white rounded-xl p-6 text-center shadow hover:shadow-lg transition">

                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-red-600 text-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8v8m0 4v-4" />
                    </svg>
                </div>

                <h3 class="font-bold text-gray-800 mb-2">
                    THANH TOÁN AN TOÀN
                </h3>

                <p class="text-gray-500 text-sm">
                    Nhiều phương thức thanh toán an toàn
                </p>

            </div>

        </div>

    </div>
</div>

@endsection