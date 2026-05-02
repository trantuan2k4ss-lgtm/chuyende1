@extends('client.layout')

@section('content')

<div class="min-h-[80vh] bg-gray-100 py-12">

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow">

        <h2 class="text-2xl font-bold mb-6">
            Thông tin cá nhân
        </h2>

        @if(session('success'))
        <div class="bg-green-100 text-green-600 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="/profile" class="space-y-4">
            @csrf

            {{-- NAME --}}
            <div>
                <label class="text-sm text-gray-600">Họ tên</label>
                <input type="text" name="name"
                    value="{{ auth()->user()->name }}"
                    class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-black">
            </div>

            {{-- EMAIL (READONLY) --}}
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input type="email"
                    value="{{ auth()->user()->email }}"
                    disabled
                    class="w-full border px-4 py-3 rounded-lg bg-gray-100">
            </div>

            {{-- PHONE --}}
            <div>
                <label class="text-sm text-gray-600">Số điện thoại</label>
                <input type="text" name="phone"
                    value="{{ auth()->user()->phone }}"
                    class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-black">
            </div>

            {{-- ADDRESS --}}
            <div>
                <label class="text-sm text-gray-600">Địa chỉ</label>
                <textarea name="address"
                    class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-black">{{ auth()->user()->address }}</textarea>
            </div>

            {{-- BUTTON --}}
            <button class="w-full bg-black text-white py-3 rounded-lg hover:bg-gray-800 transition">
                Cập nhật
            </button>
            <div class="w-full bg-white border border-gray-300 text-black py-3 rounded-lg text-center hover:bg-white-800 transition">
                <a href="/profile/order">Đơn hàng của tôi</a>
            </div>

        </form>

    </div>

</div>

@endsection