<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokumenAdminController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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
    // view home
    Route::get('/', function () {
        return view('admin.home-admin');
    })->name('home');

    // view dashboard admin
    //fungsi middleware untuk restricted page harus login
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard')->middleware('auth', 'roleCheck:kaprodi,administrator');

    //view register akun
    Route::get('/tambah-akun', [AdminController::class, 'tambah'])->name('tambah-user');

    //view tambah dokumen
    Route::get('/add/dokumen/prodi', [DokumenAdminController::class, 'prodi'])->name('dokumen-prodi');
    Route::get('/add/dokumen/himpunan', [DokumenAdminController::class, 'himpunan'])->name('dokumen-himpunan');

    // view dokumen group
    Route::prefix('dokumen')->name('dokumen.')->group(function () {
        Route::get('/prodi', [DokumenAdminController::class, 'index_dokumenProdi'])->name('prodi');
        Route::get('/himpunan', [DokumenAdminController::class, 'index_dokumenHimpunan'])->name('himpunan');
    });

    // fungsi store dokumen
    Route::post('/store-dokumen', [DokumenAdminController::class, 'store_dokumen'])->name('store-dokumen');

    // view login admin
    Route::get('/login', function () {
        return view('admin.login');
    })->name('login')->middleware('guest');

    //fungsi post register akun
    Route::post('/store-register', [RegisterController::class, 'store']);

    // fungsi post login akun
    Route::post('/post-login', [AuthController::class, 'postLogin']);

    // fungsi logout akun
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/login', function () {
    return view('admin.layouts.login');
});

Route::get('/home', function () {
    return view('admin.layouts.home');
});

//login
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('post-login');
Route::get('/logout', [AuthController::class, 'logout']);
