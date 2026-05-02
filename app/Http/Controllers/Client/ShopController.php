<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // lọc theo category (slug)
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // lọc theo keyword (tên sản phẩm)
        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $products = $query->latest()->paginate(12);

        return view('client.shop', compact('products'));
    }
}
