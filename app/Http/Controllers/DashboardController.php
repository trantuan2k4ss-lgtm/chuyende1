<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', [
            'totalProducts' => Product::count(),
            'totalCategories' => Category::count(),
            'totalOrders' => Order::count(),
            // Doanh thu = total_price - discount
            'revenue' => Order::sum('total_price') - Order::sum('discount_amount'),
            'latestOrders' => Order::latest()->take(5)->get(),
            'latestProducts' => Product::latest()->take(5)->get(),
        ]);
    }
}
