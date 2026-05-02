<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ProfileController extends Controller
{
    public function index()
    {
        return view('client.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'nullable',
            'address' => 'nullable'
        ]);

        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return back()->with('success', 'Cập nhật thành công');
    }
    public function orders()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('client.profile_orders', compact('orders'));
    }
}
