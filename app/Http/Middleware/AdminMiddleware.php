<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // chưa đăng nhập
        if (!auth()->check()) {
            return redirect('/login')->withErrors('Bạn cần đăng nhập');
        }

        // không phải admin
        if (auth()->user()->role !== 'admin') {
            // abort(403, 'Bạn không có quyền truy cập');
            return redirect('/')->withErrors('Bạn không có quyền truy cập');
        }

        return $next($request);
    }
}
