<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    //
    public function postLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session('')->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function showusername()
    {
        if (Auth::check()) {
            $userName = Auth::user()->name;
            return "Nama pengguna yang sedang login: " . $userName;
        }

        return "Tidak ada pengguna yang login saat ini.";
    }
}
