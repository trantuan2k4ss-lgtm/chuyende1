@extends('client.layout')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-10">

    {{-- TITLE --}}
    <h2 class="text-center text-red-600 text-2xl font-bold mb-8 uppercase">
        Sản phẩm mới
    </h2>

    {{-- GRID --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">

        @foreach($products as $p)
        <a href="{{ route('product.detail', $p->slug) }}" class="group">

            <div class="bg-white border rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">

                {{-- IMAGE --}}
                <div class="relative bg-gray-100 overflow-hidden">

                    <img src="{{ asset('storage/'.$p->image) }}"
                        class="w-full h-[260px] object-cover group-hover:scale-105 transition duration-300">

                    {{-- BADGE --}}
                    <div class="absolute bottom-0 left-0 w-full bg-red-600 text-white text-xs flex justify-between px-3 py-2">
                        <span>MUA LÀ CÓ QUÀ</span>
                        <span>ONLINE</span>
                    </div>

                </div>

                {{-- INFO --}}
                <div class="p-3">

                    {{-- NAME --}}
                    <h3 class="text-sm text-gray-800 line-clamp-2 min-h-[40px]">
                        {{ $p->name }}
                    </h3>

                    {{-- PRICE --}}
                    <div class="mt-2">

                        @if($p->sale_price)

                        <p class="text-red-600 font-semibold">
                            {{ number_format($p->sale_price) }}đ
                        </p>

                        <div class="flex items-center gap-2 text-xs mt-1">
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

            </div>

        </a>
        @endforeach

    </div>

    {{-- PAGINATION --}}
    <div class="mt-10 flex justify-center">
        {{ $products->links() }}
    </div>

</div>

@endsection