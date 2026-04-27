<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('petugas')->check()) {
            if (Auth::guard('masyarakat')->check()) {
                return redirect('/home_masyarakat')->with('error', 'Anda tidak memiliki akses ke halaman Petugas.');
            }
            if (Auth::guard('admin')->check()) {
                return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman Petugas.');
            }
            return redirect('/login');
        }

        return $next($request);
    }
}