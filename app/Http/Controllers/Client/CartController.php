<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('client.cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = \App\Models\Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->sale_price ?? $product->price,
                'image' => $product->image,
                'quantity' => $request->quantity
            ];
        }

        session()->put('cart', $cart);

        $count = array_sum(array_column($cart, 'quantity'));

        // 🔥 QUAN TRỌNG: phải return JSON
        return response()->json([
            'success' => true,
            'count' => $count
        ]);
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $quantities = $request->quantities;

        foreach ($quantities as $id => $qty) {

            if (!isset($cart[$id])) continue;

            // lấy sản phẩm thật từ DB để kiểm tra tồn kho
            $product = Product::find($id);

            if (!$product) continue;

            // kiểm tra số lượng hợp lệ
            if ($qty < 1) {
                $qty = 1;
            }

            if ($qty > $product->stock) {
                return back()->withErrors([
                    'stock_error' => "Sản phẩm {$product->name} chỉ còn {$product->stock} sản phẩm trong kho."
                ]);
            }

            // cập nhật lại giỏ
            $cart[$id]['quantity'] = $qty;
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Đã cập nhật giỏ hàng');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Đã xoá');
    }
}
