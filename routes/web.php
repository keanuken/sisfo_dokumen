<?php

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

Route::get('/', function () {
    return view('admin.layouts.master');
});

Route::get('/login', function () {
    return view('admin.layouts.login');
});

//login
Route::post('/post-login', [AuthController::class, 'postLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
