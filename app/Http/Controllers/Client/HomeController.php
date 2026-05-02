<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Voucher;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'hien')
            ->latest()
            ->take(15)
            ->get();
        $categories = Category::where('status', 'hien')->get();
        $vouchers = Voucher::where('status', 'hien')
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->take(6)
            ->get();

        return view('client.home', compact('products', 'categories', 'vouchers'));
    }
}
