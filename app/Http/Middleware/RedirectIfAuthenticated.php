<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                Auth::logout(); // fungsi untuk logout user
                $request->session()->invalidate(); //menghapus session

                return response()->json([
                    'message' => 'UPS. MOHON MAAF ANDA TIDAK BISA MENGAKSES HALAMAN INI. SILAHKAN REFRESH HALAMAN UNTUK KEMBALI :)'
                ], 403);

                return redirect('/admin/login');
            }
        }

        return $next($request);
    }
}
