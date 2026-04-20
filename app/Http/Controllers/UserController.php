<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // LIST
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    // FORM CREATE
    public function create()
    {
        return view('users.create');
    }

    // STORE
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'nullable',
            'address' => 'nullable',
            'role' => 'required|in:admin,customer',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Thêm user thành công');
    }

    // FORM EDIT
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // UPDATE
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'phone' => 'nullable',
            'address' => 'nullable',
            'role' => 'required|in:admin,customer',
        ]);

        // nếu có nhập password mới
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Cập nhật thành công');
    }

    // DELETE
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Đã xóa user');
    }
}
