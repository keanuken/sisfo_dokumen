<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // if (!Auth::check()) {
        //     return redirect('admin.login');
        // }

        if (in_array($request->user()->roles, $roles)) {
            return $next($request);
        }

        // Auth::logout(); // fungsi untuk logout user
        // $request->session()->invalidate(); //menghapus session

        // return response()->json([
        //     'message' => 'UPS KALAU KAMU MAHASISWA ATAU DOSEN, MOHON MAAF TIDAK BISA MENGAKSES LAMAN INI. SILAHKAN KEMBALI :).'
        // ], 403);

        // if (in_array($request->user()->roles, $roles)) {
        //     return $next($request);
        // }
        // return route('admin.login');
    }
}
