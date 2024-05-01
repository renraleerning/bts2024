<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/jabatan', \App\Http\Controllers\Controller_jabatan::class);
Route::resource('/bagian', \App\Http\Controllers\Bagian_controller::class);
Route::resource('/pegawai', \App\Http\Controllers\Controller_pegawai::class);
Route::resource('/tamu', \App\Http\Controllers\Tamu_controller::class);

