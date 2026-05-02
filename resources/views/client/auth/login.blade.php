@extends('client.layout')

@section('content')

<div class="min-h-[80vh] flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">

        <h2 class="text-2xl font-bold text-center mb-6">
            Đăng nhập
        </h2>

        @if(session('error'))
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="/login" class="space-y-4">
            @csrf

            <input type="email" name="email"
                placeholder="Email"
                class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-black outline-none">

            <input type="password" name="password"
                placeholder="Mật khẩu"
                class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-black outline-none">

            <button class="w-full bg-black text-white py-3 rounded-lg hover:bg-gray-800 transition">
                Đăng nhập
            </button>
        </form>

        <p class="text-sm text-center mt-6">
            Chưa có tài khoản?
            <a href="/register" class="text-blue-500 hover:underline">
                Đăng ký
            </a>
        </p>

    </div>

</div>

@endsection