@extends('client.layout')

@section('content')

<div class="min-h-[70vh] flex flex-col items-center justify-center text-center">

    <img
        src="https://tokyolife.vn/images/checkout/CheckoutSuccess.svg"
        alt="Success">

    <h1 class="text-3xl font-bold text-green-600 mb-4">
        Đặt hàng thành công
    </h1>
    <p class="text-gray-600 mb-6">
        Nếu đơn hàng không có thay đổi, Shop sẽ không gọi xác nhận.
        Trường hợp Quý khách cần hỗ trợ hoặc có yêu cầu khác, vui lòng liên hệ Dịch vụ Khách hàng qua hotline 0338022004
    </p>

    <button
        onclick="window.location.href='/'"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Tiếp tục mua sắm
    </button>

</div>

@endsection