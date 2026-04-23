<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // 👉 Tổng lợi nhuận từ order_items
        $profitItems = OrderItem::whereHas('order', function ($q) {
            $q->where('status', 'hoan_thanh');
        })
            ->selectRaw('SUM((price - cost_price) * quantity) as profit')
            ->value('profit') ?? 0;

        // 👉 Tổng discount (voucher)
        $discount = Order::where('status', 'hoan_thanh')
            ->sum('discount_amount');

        // 👉 Lợi nhuận cuối
        $profit = $profitItems - $discount;

        return view('dashboard', [
            'totalProducts' => Product::count(),
            'totalCategories' => Category::count(),
            'totalOrders' => Order::count(),

            // 🔥 sửa ở đây
            'profit' => $profit,

            // (optional) vẫn giữ revenue nếu cần
            'revenue' => Order::where('status', 'hoan_thanh')
                ->sum('total_price'),

            'latestOrders' => Order::latest()->take(5)->get(),
            'latestProducts' => Product::latest()->take(5)->get(),
            'lowStockProducts' => Product::where('stock', '<', 5)
                ->orderBy('stock', 'asc')
                ->take(10)
                ->get(),
        ]);
    }
}
