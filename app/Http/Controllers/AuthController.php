<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    // yang lama dan bisa dipakai, barangkali yang baru ada error bisa pakai ini untuk jaga2!
    public function postLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // $request->session('')->regenerate();

            // return redirect()->intended('admin');
            if (Auth::user()->roles == 'administrator' || Auth::user()->roles == 'kaprodi') {
                return redirect()->intended('admin/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password anda salah.',
        ])->onlyInput('email');
    }

    public function loginHimpunan(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // $request->session('')->regenerate();

            if (Auth::user()->roles == 'mahasiswa') {
                return redirect()->intended('himpunan/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password anda salah.',
        ])->onlyInput('email');
    }

    public function loginBeranda(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // $request->session('')->regenerate();

            // return redirect()->intended('admin');
            if (in_array(Auth::user()->roles, ['administrator', 'kaprodi', 'dosen'])) {
                return redirect()->intended('beranda');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password anda salah.',
        ])->onlyInput('email');
    }

    public function logoutBeranda()
    {
        Auth::logout();
        return redirect('beranda/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    public function logoutHimpunan()
    {
        Auth::logout();
        return redirect('himpunan/login');
    }

    public function showusername()
    {
        if (Auth::check()) {
            $userName = Auth::user()->name;
            return $userName;
        }
    }

    public function ekoshow()
    {
        if (Auth::check()) {
            $userName = Auth::user()->name;
            return $userName;
        }
    }
}
