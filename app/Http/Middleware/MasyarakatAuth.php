<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasyarakatAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('masyarakat')->check()) {
            if (Auth::guard('admin')->check()) {
                return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman Masyarakat.');
            }
            if (Auth::guard('petugas')->check()) {
                return redirect('/home_petugas')->with('error', 'Anda tidak memiliki akses ke halaman Masyarakat.');
            }
            return redirect('/login');
        }

        return $next($request);
    }
}