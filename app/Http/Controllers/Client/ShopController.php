<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'hien')
            ->latest()
            ->paginate(8);

        return view('client.shop', compact('products'));
    }
}
