<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherClientController extends Controller
{
    public function apply(Request $request)
    {
        $code = $request->code;

        $voucher = \App\Models\Voucher::where('code', $code)
            ->where('status', 'hien')
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->first();

        if (!$voucher) {
            return response()->json([
                'success' => false,
                'message' => 'Mã không hợp lệ hoặc hết hạn'
            ]);
        }

        // tính tổng cart
        $cart = session('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // check min order
        if ($voucher->min_order && $total < $voucher->min_order) {
            return response()->json([
                'success' => false,
                'message' => 'Chưa đủ giá trị tối thiểu'
            ]);
        }

        // 🔥 TÍNH DISCOUNT ĐÚNG
        if ($voucher->type == 'percent') {
            $discount = $total * ($voucher->value / 100);
        } else {
            $discount = $voucher->value;
        }

        // không cho vượt quá total
        $discount = min($discount, $total);

        // lưu session
        session([
            'discount' => $discount,
            'voucher_id' => $voucher->id
        ]);

        return response()->json([
            'success' => true,
            'discount' => $discount
        ]);
    }
}
