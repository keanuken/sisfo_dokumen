<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    //view register akun
    Route::get('/tambah-akun', [AdminController::class, 'tambah'])->name('tambah-user');

    // view login admin
    Route::get('/login', function () {
        return view('admin.login');
    });

    //fungsi post register akun
    Route::post('/store-register', [RegisterController::class, 'store']);

    // fungsi post login akun
    Route::post('/post-login', [AuthController::class, 'postLogin']);

    // fungsi logout akun
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
