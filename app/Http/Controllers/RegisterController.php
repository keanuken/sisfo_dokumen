<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

// yang baru dan jika error bisa pakai yang lama
class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'roles' => 'requred',
        ]);

        $input = $request->all();

        // Check if email already exists
        $existingUser = User::where('email', $input['email'])->first();

        if ($existingUser) {
            // Email already exists
            return redirect('admin/tambah-akun')->with('error', 'Email sudah ada, silahkan gunakan email lain!');
        } else {
            // Email is unique
            $password = bcrypt($request->input('password'));
            $input['password'] = $password;

            User::create($input);
            return redirect('admin/tambah-akun')->with('success', 'Akun berhasil dibuat!');
        }
    }
}



// yang lama dan sudah fix
// class RegisterController extends Controller
// {
//     //
//     public function store(Request $request)
//     {

//         $this->validate($request, [
//             'name' => 'required',
//             'email' => 'required',
//             'password' => 'required',
//             'roles' => 'required',
//         ]);

//         $input = $request->all();
//         $password = bcrypt($request->input('password'));
//         $input['password'] = "$password";

//         User::create($input);
//         return redirect('admin/tambah-akun');
//     }
// }
