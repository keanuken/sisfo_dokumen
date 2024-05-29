<?php

namespace App\Http\Controllers;

use App\Models\document;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

setlocale(LC_TIME, 'id_ID');
\Carbon\Carbon::setLocale('id');

class AdminController extends Controller
{
    public function tambah()
    {
        return view('admin.tambah-user');
    }

    public function readUser()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->tanggal = Carbon::parse($user->created_at)->isoFormat('D MMMM Y');
            $user->tanggalUpdate = Carbon::parse($user->updated_at)->diffForHumans();
        }
        return view('admin.userDetail', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::find($id);
        // dd($document);
        return view('admin.userEdit', compact('user'));
    }

    public function deleteUser($id, Request $request)
    {
        $q = User::find($id);
        $q->delete($request->all());
        return redirect()->back()->with("error", "User berhasil dihapus.");
    }

    public function updateUser($id, Request $request)
    {
        $input = $request->all();

        if ($request->has('password')) {
            $password = $request->input('password');
            if (strlen($password) < 8) {
                return redirect()->back()->with("error", "Password harus minimal 8 karakter.");
            }
            $input['password'] = bcrypt($password);
        }

        User::find($id)->update($input);
        return redirect()->route('admin.listUser')->with("success", "User berhasil diupdate.");
    }
}
