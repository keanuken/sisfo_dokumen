<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Authentication passed...
            return redirect()->intended('dashboard'); // Change 'dashboard' to your desired redirect route
        } else {
            return redirect()->back()->withErrors(['Invalid credentials']);
        }
    }
}
