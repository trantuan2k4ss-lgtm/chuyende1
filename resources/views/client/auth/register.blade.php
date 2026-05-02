@extends('client.layout')

@section('content')

<div class="min-h-[80vh] flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">

        <h2 class="text-2xl font-bold text-center mb-6">
            Đăng ký
        </h2>

        {{-- ERROR GLOBAL --}}
        @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
            <ul>
                @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="/register" class="space-y-4">
            @csrf

            {{-- NAME --}}
            <div>
                <input type="text" name="name"
                    value="{{ old('name') }}"
                    placeholder="Họ tên"
                    class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-black
                    @error('name') border-red-500 @enderror">

                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div>
                <input type="email" name="email"
                    value="{{ old('email') }}"
                    placeholder="Email"
                    class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-black
                    @error('email') border-red-500 @enderror">

                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- PHONE --}}
            <div>
                <input type="text" name="phone"
                    value="{{ old('phone') }}"
                    placeholder="Số điện thoại"
                    class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-black
                    @error('phone') border-red-500 @enderror">

                @error('phone')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- ADDRESS --}}
            <div>
                <input type="text" name="address"
                    value="{{ old('address') }}"
                    placeholder="Địa chỉ"
                    class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-black
                    @error('address') border-red-500 @enderror">

                @error('address')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- PASSWORD --}}
            <div>
                <input type="password" name="password"
                    placeholder="Mật khẩu"
                    class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-black
                    @error('password') border-red-500 @enderror">

                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- BUTTON --}}
            <button class="w-full bg-black text-white py-3 rounded-lg hover:bg-gray-800 transition">
                Tạo tài khoản
            </button>
        </form>

        <p class="text-sm text-center mt-6">
            Đã có tài khoản?
            <a href="/login" class="text-blue-500 hover:underline">
                Đăng nhập
            </a>
        </p>

    </div>

</div>

@endsection