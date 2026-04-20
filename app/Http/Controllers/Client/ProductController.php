<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($slug)
    {
        // lấy sản phẩm theo slug
        $product = Product::with('images')
            ->where('slug', $slug)
            ->firstOrFail();

        // sản phẩm liên quan
        $related = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('client.product_detail', compact('product', 'related'));
    }
}
