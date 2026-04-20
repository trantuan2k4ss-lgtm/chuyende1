<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Danh sách đơn hàng
    public function index()
    {
        $orders = Order::latest()->paginate(10);

        return view('orders.index', compact('orders'));
    }

    // Chi tiết đơn hàng
    public function show(Order $order)
    {
        $order->load('items.product');

        return view('orders.show', compact('order'));
    }

    // Cập nhật trạng thái
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:cho_xac_nhan,da_xac_nhan,dang_giao,hoan_thanh,da_huy'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Cập nhật trạng thái thành công');
    }
}
