<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    // masih coba dan fix bisa
    // public function postLogin(Request $request): RedirectResponse
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         if (Auth::user()->roles === 'administrator' || Auth::user()->roles === 'kaprodi') {
    //             return redirect()->intended('admin/dashboard');
    //         } elseif (Auth::user()->roles === 'dosen' || Auth::user()->roles === 'mahasiswa') {
    //             if (url()->current() !== url('admin/login')) {
    //                 return redirect('admin/login')->withErrors([
    //                     'login_error' => 'Dosen dan Mahasiswa tidak dapat login di halaman login khusus Administrator dan Ketua Program Studi.',
    //                 ]);
    //             }
    //             // return back()->withErrors([
    //             //     'login_error' => 'Dosen dan Mahasiswa tidak dapat login di halaman login khusus Administrator dan Ketua Program Studi.',
    //             // ]);
    //         }
    //     } else {
    //         return back()->withErrors([
    //             'email' => 'Email atau password anda salah.',
    //         ])->onlyInput('email');
    //     }
    // }

    // yang lama dan bisa dipakai, barangkali yang baru ada error bisa pakai ini untuk jaga2!
    public function postLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

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

        // if (Auth::attempt($credentials)) {
        //     $request->session('')->regenerate();
        //     // return redirect()->intended('admin/login');
        //     if (Auth::user()->roles == 'administrator' && 'kaprodi') {
        //         return redirect()->intended('admin');
        //     }
        //     // masih testing, nanti sesuaikan intended ke page login khusus dosen & mhs
        //     elseif (Auth::user()->level == 'dosen' && 'mahasiswa') {
        //         return redirect()->intended('admin/login');
        //     }
        // }

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
