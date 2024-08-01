<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if (!$user) {
            // Jika pengguna tidak login, arahkan ke halaman login
            return redirect('/login');
        }

        if ($user->user_type == 'Karyawan') {
            // Jika jenis pengguna adalah Karyawan, izinkan melanjutkan request
            return $next($request);
            // return redirect('/karyawan');
        } else {
            // Jika bukan, arahkan ke halaman lain (misalnya halaman login atau dashboard yang berbeda)
            return redirect('/login');
        }
    }
}