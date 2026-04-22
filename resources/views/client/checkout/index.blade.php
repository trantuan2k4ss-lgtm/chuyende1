@extends('client.layout')

@section('content')

@php
$user = auth()->user();
@endphp

<div class="max-w-6xl mx-auto px-4 py-10 grid md:grid-cols-2 gap-10">

    {{-- FORM --}}
    <form action="{{ route('checkout.store') }}" method="POST"
        class="bg-white p-6 rounded-xl border">
        @csrf

        <h2 class="text-xl font-bold mb-6">Thông tin nhận hàng</h2>

        {{-- ERROR --}}
        @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
            @foreach ($errors->all() as $error)
            <p>• {{ $error }}</p>
            @endforeach
        </div>
        @endif

        {{-- NAME --}}
        <input type="text" name="receiver_name"
            value="{{ old('receiver_name', $user->name ?? '') }}"
            placeholder="Họ tên"
            class="w-full border p-3 mb-4 rounded
            @error('receiver_name') border-red-500 @enderror">

        {{-- PHONE --}}
        <input type="text" name="phone"
            value="{{ old('phone', $user->phone ?? '') }}"
            placeholder="Số điện thoại"
            class="w-full border p-3 mb-4 rounded
            @error('phone') border-red-500 @enderror">

        {{-- ADDRESS --}}
        <textarea name="address"
            placeholder="Địa chỉ"
            class="w-full border p-3 mb-4 rounded
            @error('address') border-red-500 @enderror">{{ old('address', $user->address ?? '') }}</textarea>

        {{-- PAYMENT METHOD --}}
        <div class="mt-6 mb-6">
            <h3 class="font-semibold mb-3">Phương thức thanh toán</h3>

            <div class="space-y-2">

                {{-- COD --}}
                <label class="flex items-center gap-3 border p-3 rounded cursor-pointer hover:border-black">
                    <input type="radio" name="payment_method" value="cod"
                        {{ old('payment_method', 'cod') == 'cod' ? 'checked' : '' }}>
                    <span>Thanh toán khi nhận hàng (COD)</span>
                </label>

                {{-- BANK --}}
                <label class="flex items-center gap-3 border p-3 rounded opacity-50 cursor-not-allowed">
                    <input type="radio" name="payment_method" value="bank" disabled>
                    <span class="text-gray-400">Chuyển khoản ngân hàng</span>
                </label>

            </div>
        </div>

        {{-- BUTTON --}}
        <button class="w-full bg-black text-white py-3 rounded-lg hover:bg-gray-800 transition">
            Đặt hàng
        </button>
    </form>

    {{-- ORDER SUMMARY --}}
    <div class="bg-white p-6 rounded-xl border">

        <h2 class="text-xl font-bold mb-6">Đơn hàng</h2>

        @php $total = 0; @endphp

        {{-- LIST PRODUCT --}}
        @foreach($cart as $item)
        @php
        $sub = $item['price'] * $item['quantity'];
        $total += $sub;
        @endphp

        <div class="flex justify-between mb-2 text-sm">
            <span>{{ $item['name'] }} x{{ $item['quantity'] }}</span>
            <span>{{ number_format($sub) }}đ</span>
        </div>
        @endforeach

        {{-- VOUCHER --}}
        <div class="mt-6">

            <label class="block text-sm font-medium mb-2">
                Mã giảm giá
            </label>

            <div class="flex gap-2">

                <input type="text" id="voucher_code"
                    placeholder="Nhập mã..."
                    class="flex-1 border px-3 py-2 rounded">

                <button type="button"
                    onclick="applyVoucher()"
                    class="bg-black text-white px-4 rounded hover:bg-gray-800">
                    Áp dụng
                </button>

            </div>

            <p id="voucher-msg" class="text-sm mt-2"></p>

        </div>

        {{-- TÍNH TIỀN --}}
        @php
        $discount = session('discount', 0);
        @endphp

        <div class="flex justify-between mt-6 text-sm">
            <span>Tạm tính</span>
            <span>{{ number_format($total) }}đ</span>
        </div>

        <div class="flex justify-between mt-2 text-sm">
            <span>Giảm giá</span>
            <span class="text-green-600">-{{ number_format($discount) }}đ</span>
        </div>

        <div class="border-t mt-4 pt-4 flex justify-between font-bold">
            <span>Tổng</span>
            <span class="text-red-600">
                {{ number_format($total - $discount) }}đ
            </span>
        </div>

    </div>

</div>

{{-- SCRIPT --}}
<script>
    function applyVoucher() {
        let code = document.getElementById('voucher_code').value;
        let msg = document.getElementById('voucher-msg');

        fetch("{{ route('voucher.apply') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    code
                })
            })
            .then(res => res.json())
            .then(data => {

                msg.classList.remove('text-red-500', 'text-green-600');

                if (data.success) {
                    msg.innerText = "Áp dụng thành công";
                    msg.classList.add("text-green-600");

                    setTimeout(() => location.reload(), 500);
                } else {
                    msg.innerText = data.message;
                    msg.classList.add("text-red-500");
                }

            })
            .catch(() => {
                msg.innerText = "Có lỗi xảy ra";
                msg.classList.add("text-red-500");
            });
    }
</script>

@endsection