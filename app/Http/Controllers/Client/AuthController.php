<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('client.auth.login');
    }

    public function showRegister()
    {
        return view('client.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer'
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            // 'phone' => 'min:10|max:10|required|numeric',
            'address' => 'optional',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->with('error', 'Sai email hoặc mật khẩu');
        }

        // 🔥 chống session fixation
        $request->session()->regenerate();

        // Kiểm tra role của user
        if (Auth::user()->role === 'admin') {
            return redirect('/admin');
        }

        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
