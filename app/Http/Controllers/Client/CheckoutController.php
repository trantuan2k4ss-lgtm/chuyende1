<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/cart');
        }

        return view('client.checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'payment_method' => 'required'
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/cart');
        }

        DB::beginTransaction();

        try {

            // 1. tính tổng tiền
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'] - session('discount', 0);
            }

            // 2. tạo order
            $order = Order::create([
                'user_id' => auth()->id() ?? 1,
                'receiver_name' => $request->receiver_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'total_price' => $total,
                'payment_method' => $request->payment_method,
                'status' => 'cho_xac_nhan'
            ]);

            // 3. xử lý từng sản phẩm
            foreach ($cart as $item) {

                $product = Product::find($item['id']);

                if (!$product) {
                    throw new \Exception("Sản phẩm không tồn tại");
                }

                // check tồn kho
                if ($product->stock < $item['quantity']) {
                    throw new \Exception("Sản phẩm {$product->name} không đủ hàng");
                }

                // trừ kho
                $product->stock -= $item['quantity'];
                $product->save();

                // tạo order item
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $item['price'],
                    'cost_price' => $product->cost_price,
                    'quantity' => $item['quantity']
                ]);
            }

            // 4. xóa giỏ hàng
            session()->forget('cart');
            session()->forget('discount');

            DB::commit();

            return redirect()->route('checkout.success');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->withErrors([
                'checkout_error' => $e->getMessage()
            ]);
        }
    }

    public function success()
    {
        return view('client.checkout.success');
    }
}
