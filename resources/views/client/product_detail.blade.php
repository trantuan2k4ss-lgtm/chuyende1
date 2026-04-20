@extends('client.layout')

@section('content')

<div class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-12">

            {{-- ================= IMAGE ================= --}}
            <div>

                {{-- MAIN IMAGE --}}
                <div class="border rounded-xl overflow-hidden">
                    <img id="mainImage"
                        src="{{ asset('storage/'.$product->image) }}"
                        class="w-full h-[500px] object-cover">
                </div>

                {{-- THUMBNAILS --}}
                <div class="flex gap-3 mt-4">

                    <img onclick="changeImage(this)"
                        src="{{ asset('storage/'.$product->image) }}"
                        class="thumb  h-20 rounded-lg border cursor-pointer">

                    @foreach($product->images as $img)
                    <img onclick="changeImage(this)"
                        src="{{ asset('storage/'.$img->image) }}"
                        class="thumb  h-20 rounded-lg border cursor-pointer">
                    @endforeach

                </div>

            </div>


            {{-- ================= INFO ================= --}}
            <div>

                {{-- TITLE --}}
                <h1 class="text-2xl font-semibold text-gray-900">
                    {{ $product->name }}
                </h1>

                {{-- PRICE --}}
                <div class="mt-4">
                    @if($product->sale_price)
                    <span class="text-gray-400 line-through text-lg">
                        {{ number_format($product->price) }}đ
                    </span>

                    <span class="ml-3 text-3xl font-bold text-red-600">
                        {{ number_format($product->sale_price) }}đ
                    </span>
                    @else
                    <span class="text-3xl font-bold text-gray-900">
                        {{ number_format($product->price) }}đ
                    </span>
                    @endif
                </div>

                {{-- STATUS --}}
                {{-- STOCK --}}
                <div class="mt-3">

                    @if($product->stock > 0)

                    <p class="text-green-600 text-sm font-medium">
                        Còn hàng ({{ $product->stock }} sản phẩm)
                    </p>

                    @else

                    <p class="text-red-600 text-sm font-medium">
                        Hết hàng
                    </p>

                    @endif

                </div>

                {{-- SIZE --}}
                @if($product->size)
                <div class="mt-6">
                    <h3 class="text-sm font-medium text-gray-900">Size</h3>

                    <div class="flex gap-2 mt-2 flex-wrap">
                        @foreach(explode(',', $product->size) as $size)
                        <button class="size-btn px-4 py-2 border rounded-lg hover:border-black">
                            {{ trim($size) }}
                        </button>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- QUANTITY --}}
                <div class="mt-6">
                    <h3 class="text-sm font-medium text-gray-900">Số lượng</h3>

                    <input type="number" value="1" min="1"
                        class="mt-2 border rounded-lg px-3 py-2 w-24 focus:ring-2 focus:ring-black">
                </div>

                {{-- BUTTON --}}
                <div class="mt-8 flex gap-4">

                    <button onclick="addToCart({{ $product->id }})"
                        class="w-full bg-black text-white py-3 rounded-lg hover:bg-gray-800">
                        Thêm vào giỏ hàng
                    </button>

                    <button onclick="addToCart({{ $product->id }}, true)" class="w-full border py-3 rounded-lg hover:bg-gray-100">
                        <a href="/cart">Mua ngay</a>
                    </button>

                </div>

                {{-- DESCRIPTION --}}
                <div class="mt-10 border-t pt-6">
                    <h3 class="text-sm font-medium text-gray-900 mb-2">
                        Mô tả sản phẩm
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $product->description }}
                    </p>
                </div>

            </div>

        </div>


        {{-- ================= RELATED ================= --}}
        <div class="mt-16">

            <h2 class="text-xl font-semibold mb-6">
                Sản phẩm liên quan
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

                @foreach($related as $p)
                <a href="/product/{{ $p->slug }}" class="group">

                    <div class="border rounded-xl overflow-hidden">
                        <img src="{{ asset('storage/'.$p->image) }}"
                            class="w-full h-52 object-cover group-hover:scale-105 transition">
                    </div>

                    <p class="mt-2 text-sm line-clamp-2 text-gray-800">
                        {{ $p->name }}
                    </p>

                    <p class="text-sm font-semibold text-red-600">
                        {{ number_format($p->sale_price ?? $p->price) }}đ
                    </p>

                </a>
                @endforeach

            </div>

        </div>

    </div>
</div>

{{-- SCRIPT --}}
<script>
    function addToCart(productId, buyNow = false) {

        let quantity = document.getElementById('qtyInput')?.value || 1;

        fetch("{{ route('cart.add') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(res => res.json())
            .then(data => {

                console.log("DATA:", data); // 🔥 debug

                if (data.success) {

                    // 🔥 FIX BADGE
                    let badge = document.getElementById('cart-count');

                    if (badge) {
                        badge.innerText = data.count;

                        // hiệu ứng nhẹ
                        badge.classList.add('scale-125');
                        setTimeout(() => badge.classList.remove('scale-125'), 200);
                    }

                    // 🔥 FIX TOAST
                    if (buyNow) {
                        window.location.href = "/cart";
                    } else {
                        showToast("Đã thêm vào giỏ hàng");
                    }

                }

            })
            .catch(err => console.error(err));
    }

    // 🔥 TOAST FUNCTION (BẮT BUỘC PHẢI CÓ)
    function showToast(message) {
        let toast = document.getElementById('toast');

        if (!toast) return;

        toast.innerText = message;

        // HIỆN
        toast.classList.remove('opacity-0', 'translate-y-2');
        toast.classList.add('opacity-100', 'translate-y-0');

        // ẨN SAU 2s
        setTimeout(() => {
            toast.classList.remove('opacity-100', 'translate-y-0');
            toast.classList.add('opacity-0', 'translate-y-2');
        }, 2000);
    }

    function changeImage(el) {
        const main = document.getElementById('mainImage');

        if (!main || !el) return;

        const newSrc = el.getAttribute('src');

        // tránh reload nếu cùng ảnh
        if (main.src === newSrc) return;

        // fade out nhẹ
        main.classList.add('opacity-0');

        setTimeout(() => {
            main.src = newSrc;

            // fade in
            main.classList.remove('opacity-0');
        }, 150);

        // update active thumbnail
        document.querySelectorAll('.thumb').forEach(img => {
            img.classList.remove('ring-2', 'ring-black', 'opacity-100');
            img.classList.add('opacity-60');
        });

        el.classList.add('ring-2', 'ring-black', 'opacity-100');
    }
</script>

@endsection