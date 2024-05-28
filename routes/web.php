<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokumenAdminController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokumenHimpunanController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'cardHome'])->name('home');
Route::get('/dokumen-publik', [HomeController::class, 'homePublik'])->name('dokumen-publik');
Route::get('/{id_dokumen}/dokumen-detail', [HomeController::class, 'detail'])->name('docDetail');


// prefix beranda
Route::prefix('beranda')->name('beranda.')->group(function () {
    Route::get('/', [HomeController::class, 'cardBeranda'])->middleware('beranda');

    Route::get('/dokumen-publik', [HomeController::class, 'indexPublik'])->name('docPublik')->middleware('beranda');
    Route::get('/dokumen-private', [HomeController::class, 'indexPrivate'])->name('docPrivate')->middleware('beranda');
    Route::get('/{id_dokumen}/dokumen-detail', [HomeController::class, 'detailDokumen'])->name('docDetail')->middleware('beranda');

    Route::get('/login', function () {
        return view('beranda.login');
    })->name('login')->middleware('guest');

    Route::post('/post-login', [AuthController::class, 'loginBeranda'])->name('loginBeranda');
    Route::get('/logout', [AuthController::class, 'logoutBeranda'])->name('logoutBeranda')->middleware('beranda');
});

// PREFIX ADMIN
Route::prefix('admin')->name('admin.')->group(function () {
    // view home
    Route::get('/', function () {
        return view('admin.home-admin');
    })->name('home')->middleware('guest');

    // view dashboard admin
    //fungsi middleware untuk restricted page harus login
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard')->middleware('admin');

    //view register akun
    Route::get('/tambah-akun', [AdminController::class, 'tambah'])->name('tambah-user')->middleware('admin');

    //view tambah dokumen
    Route::get('/add/dokumen/prodi', [DokumenAdminController::class, 'prodi'])->name('dokumen-prodi')->middleware('admin');
    Route::get('/add/dokumen/himpunan', [DokumenAdminController::class, 'himpunan'])->name('dokumen-himpunan')->middleware('admin');

    // view dokumen group
    Route::prefix('dokumen')->middleware('admin')->name('dokumen.')->group(function () {
        Route::get('/prodi', [DokumenAdminController::class, 'index_dokumenProdi'])->name('prodi');
        Route::get('/himpunan', [DokumenAdminController::class, 'index_dokumenHimpunan'])->name('himpunan');
        Route::get('/{id_dokumen}/edit', [DokumenAdminController::class, 'editDokumen'])->name('edit');
        Route::put('/{id_dokumen}/update', [DokumenAdminController::class, 'updateDokumen'])->name('update');
        Route::delete('/{id_dokumen}/delete', [DokumenAdminController::class, 'deleteDokumen'])->name('delete');
        Route::get('/{id_dokumen}/dokumen-detail', [DokumenAdminController::class, 'detail'])->name('docDetail');
    });

    // fungsi store dokumen
    Route::post('/store-dokumen', [DokumenAdminController::class, 'store_dokumen'])->name('store-dokumen')->middleware('admin');

    // view login admin
    Route::get('/login', function () {
        return view('admin.login');
    })->name('login')->middleware('guest');

    //fungsi post register akun
    Route::post('/store-register', [RegisterController::class, 'store'])->middleware('admin');

    // fungsi post login akun
    Route::post('/post-login', [AuthController::class, 'postLogin'])->name('postLogin');


    // fungsi logout akun
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('admin');
});


// PREFIX HIMPUNAN
Route::prefix('himpunan')->name('himpunan.')->group(function () {
    // view home
    Route::get('/', function () {
        return view('admin.home-admin');
    })->name('home')->middleware('guest');
    //fungsi middleware untuk restricted page harus login
    Route::get('/dashboard', function () {
        return view('himpunan.dashboard');
    })->name('dashboard')->middleware('himpunan');

    //view tambah dokumen
    Route::get('/add/dokumen/', [DokumenHimpunanController::class, 'himpunan'])->name('dokumen-himpunan')->middleware('himpunan');

    // fungsi store dokumen
    Route::post('/store-dokumen', [
        DokumenHimpunanController::class, 'store_dokumen'
    ])->name('store-dokumen')->middleware('himpunan');

    // view dokumen group
    Route::prefix('dokumen')->middleware('himpunan')->name('dokumen.')->group(function () {
        Route::get('/', [DokumenHimpunanController::class, 'index_dokumenHimpunan'])->name('himpunan');
        Route::get('/{id_dokumen}/edit', [DokumenHimpunanController::class, 'editDokumen'])->name('edit');
        Route::put('/{id_dokumen}/update', [DokumenHimpunanController::class, 'updateDokumen'])->name('update');
        Route::delete('/{id_dokumen}/delete', [DokumenHimpunanController::class, 'deleteDokumen'])->name('delete');
        Route::get('/{id_dokumen}/dokumen-detail', [DokumenHimpunanController::class, 'detail'])->name('docDetail');
    });

    // view login himpunan
    Route::get('/login', function () {
        return view('himpunan.login');
    })->name('loginHimpunan')->middleware('guest');

    // fungsi post login akun
    Route::post('/post-login', [AuthController::class, 'loginHimpunan'])->name('postLoginHimpunan')->middleware('guest');

    // fungsi logout akun
    Route::get('/logout', [AuthController::class, 'logoutHimpunan'])->name('logoutHimpunan')->middleware('himpunan');
});
