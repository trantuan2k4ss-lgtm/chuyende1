<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VoucherController extends Controller
{
    // LIST
    public function index()
    {
        $vouchers = Voucher::latest()->paginate(10);
        return view('vouchers.index', compact('vouchers'));
    }

    // FORM CREATE
    public function create()
    {
        return view('vouchers.create');
    }

    // STORE
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'nullable|unique:vouchers,code',
            'name' => 'required',
            'type' => 'required|in:percent,fixed',
            'value' => 'required|numeric|min:0',
            'min_order' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:hien,an',
        ]);

        // auto code nếu không nhập
        if (empty($data['code'])) {
            $data['code'] = strtoupper(Str::random(8));
        }

        Voucher::create($data);

        return redirect()->route('vouchers.index')->with('success', 'Thêm thành công');
    }

    // FORM EDIT
    public function edit(Voucher $voucher)
    {
        return view('vouchers.edit', compact('voucher'));
    }

    // UPDATE
    public function update(Request $request, Voucher $voucher)
    {
        $data = $request->validate([
            'code' => 'required|unique:vouchers,code,' . $voucher->id,
            'name' => 'required',
            'type' => 'required|in:percent,fixed',
            'value' => 'required|numeric|min:0',
            'min_order' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:hien,an',
        ]);

        $voucher->update($data);

        return redirect()->route('vouchers.index')->with('success', 'Cập nhật thành công');
    }

    // DELETE
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return back()->with('success', 'Đã xóa');
    }
}
