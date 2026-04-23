<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Fashion Shop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-100">

    <!-- HEADER -->
    <header class="sticky top-0 z-50 shadow" style="background: rgb(250, 239, 218);">

        {{-- TOP --}}
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between gap-4">

            {{-- LOGO --}}
            <a href="/">
                <img src="https://pickleballshop.vn/wp-content/uploads/2024/10/logo-pickleball-full-color-1024x257.png"
                    class="w-32">
            </a>

            {{-- SEARCH --}}
            <div class="flex-1 mx-6">
                <form action="/shop" method="GET" class="flex">

                    <input type="text"
                        name="keyword"
                        placeholder="Tìm kiếm sản phẩm..."
                        autocomplete="off"
                        class="w-full border rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-black">

                    <button class="bg-black text-white px-4 rounded-r-lg hover:bg-gray-800 transition">

                        {{-- ICON GIỮ NGUYÊN --}}
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" />
                        </svg>

                    </button>

                </form>
            </div>

            {{-- ICONS --}}
            <div class="flex items-center gap-6">

                {{-- CART --}}
                @php
                $count = 0;
                if(session('cart')){
                foreach(session('cart') as $item){
                $count += $item['quantity'];
                }
                }
                @endphp

                <a href="{{ route('cart.index') }}" class="relative group">

                    {{-- ICON GIỮ NGUYÊN --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        class="w-6 h-6 group-hover:text-red-500 transition">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386a.75.75 0 0 1 .73.602l.447 2.236m0 0L6.75 14.25h10.5l2.25-8.25H5.813m0 0L4.5 3.75M6.75 14.25 5.25 6m1.5 8.25h10.5M9 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm9 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>

                    {{-- BADGE --}}
                    <span id="cart-count" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
                        {{ $count }}
                    </span>

                </a>

                {{-- USER --}}
                @auth

                <div class="relative group cursor-pointer">

                    <div class="flex items-center gap-1 hover:text-red-500">

                        {{-- ICON GIỮ NGUYÊN --}}
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a8.25 8.25 0 0 1 15 0" />
                        </svg>

                    </div>

                    {{-- DROPDOWN --}}
                    <div class="absolute right-0 w-40 bg-white border rounded-lg shadow hidden group-hover:block">
                        @auth
                        <a href="/profile" class="block px-4 py-2 hover:bg-gray-100">{{ auth()->user()->name }}</a>
                        @endauth
                        <a href="/profile/order" class="block px-4 py-2 hover:bg-gray-100">Đơn hàng</a>

                        <form method="POST" action="/logout">
                            @csrf
                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                Đăng xuất
                            </button>
                        </form>
                    </div>

                </div>

                @else

                <a href="/login" class="hover:text-red-500">

                    {{-- ICON GIỮ NGUYÊN --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a8.25 8.25 0 0 1 15 0" />
                    </svg>

                </a>

                @endauth

            </div>

        </div>

        {{-- CATEGORY --}}
        <div class="bg-gray-50 border-b">
            <div class="max-w-7xl mx-auto px-4 py-2 flex justify-center">

                <div class="flex gap-6 overflow-x-auto whitespace-nowrap">

                    <a href="/shop"
                        class="text-sm font-medium hover:text-red-500">
                        Tất cả
                    </a>

                    @foreach($globalCategories as $c)
                    <a href="/shop?category={{ $c->slug }}"
                        class="text-sm font-medium hover:text-red-500">
                        {{ $c->name }}
                    </a>
                    @endforeach

                </div>

            </div>
        </div>

    </header>
    <!-- CATEGORY BAR -->
    <div id="toast"
        class="fixed top-16 right-5 z-50 flex items-center gap-3 px-4 py-3 rounded-lg shadow-lg
           bg-green-100 text-black
           opacity-0 translate-y-2 pointer-events-none
           transition-all duration-300">

        <!-- ICON -->
        <div class="bg-green-500 text-white rounded-full p-1 shrink-0 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4"
                viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M16.704 5.29a1 1 0 010 1.42l-7.25 7.25a1 1 0 01-1.42 0l-3.25-3.25a1 1 0 111.42-1.42l2.54 2.54 6.54-6.54a1 1 0 011.42 0z"
                    clip-rule="evenodd" />
            </svg>
        </div>

        <!-- TEXT -->
        <span id="toast-text" class="text-sm font-medium"></span>

    </div>


    {{-- CONTENT --}}
    @yield('content')

    {{-- FOOTER --}}
    <footer class="mt-16">

        {{-- BOTTOM --}}
        <div class="bg-black py-4">
            <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center justify-center gap-4 text-white">

                {{-- LOGO --}}
                <img
                    src="https://tokyolife.vn/_next/static/media/logo-chu-hac-trang.577cda3d.png"
                    class="h-6 object-contain"
                    alt="TokyoLife">

                {{-- TEXT --}}
                <p class="text-sm text-gray-300">
                    Copyright © 2014-2026 Tokyolife.vn All Rights Reserved.
                </p>

            </div>
        </div>

    </footer>

</body>

</html>