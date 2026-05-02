@extends('client.layout')

@section('content')

<div class="min-h-screen bg-gray-50 flex items-center justify-center px-6">

    <div class="max-w-xl w-full text-center">

        <!-- Icon -->
        <div class="mb-6">
            <div class="w-24 h-24 mx-auto bg-gray-200 rounded-full flex items-center justify-center text-4xl">
                😵
            </div>
        </div>

        <!-- Title -->
        <h1 class="text-4xl font-bold text-gray-800 mb-3">
            404
        </h1>

        <p class="text-gray-500 mb-6">
            Trang bạn đang tìm không tồn tại hoặc đã bị xoá.
        </p>

        <!-- Search -->
        <form action="/shop" method="GET" class="mb-6">
            <div class="flex items-center bg-white border rounded-lg overflow-hidden shadow-sm">

                <input
                    type="text"
                    name="keyword"
                    placeholder="Tìm sản phẩm..."
                    autocomplete="off"
                    class="w-full px-4 py-3 outline-none">

                <button
                    type="submit"
                    class="bg-black text-white px-5 py-3 hover:bg-gray-800">
                    Tìm
                </button>

            </div>
        </form>

        <!-- Actions -->
        <div class="flex gap-4 justify-center">

            <a href="/"
                class="px-6 py-3 bg-black text-white rounded-lg hover:bg-gray-800">
                Trang chủ
            </a>

            <a href="/cart"
                class="px-6 py-3 border rounded-lg hover:bg-gray-100">
                Giỏ hàng
            </a>

        </div>

    </div>

</div>

@endsection