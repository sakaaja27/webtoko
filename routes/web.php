<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TypeMobilController;
use App\Http\Controllers\JenisMobilController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CabangController;
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
    return view('welcome');
});
// 
Route::get('/home',[TransaksiController::class,'hometes'])->name('home');
Route::get('/dashboard',[TransaksiController::class,'dashboard'])->name('dashboard');
// 
Route::get('/mobil',[TransaksiController::class,'mobil'])->name('mobil');

// typemobil
Route::get('/typemobil',[TypeMobilController::class,'index'])->name('typemobil');
Route::post('/typemobil/store',[TypeMobilController::class,'store'])->name('typemobil.store');

// jenismobil
Route::get('/jenismobil',[JenisMobilController::class,'index'])->name('jenismobil');
Route::post('/jenismobil/store',[JenisMobilController::class,'store'])->name('jenismobil.store');
Route::get('/delmobil/{id}',[JenisMobilController::class,'delmobil'])->name('delmobil');
Route::get('/destroy/{id}',[JenisMobilController::class,'destroy'])->name('destroy');

// payment
Route::get('/payment',[PembayaranController::class,'index'])->name('payment');
Route::post('/payment/store',[PembayaranController::class,'store'])->name('payment.store');

// customer
Route::get('/customer',[CustomerController::class,'index'])->name('customer');
Route::post('/customer/store',[CustomerController::class,'store'])->name('customer.store');
Route::get('/delcust/{id}',[CustomerController::class,'delcust'])->name('delcust');
Route::get('/destroy/{id}',[JenisMobilController::class,'destroy'])->name('destroy');

// cabang
Route::get('/cabang',[CabangController::class,'index'])->name('cabang');
Route::post('/cabang/store',[CabangController::class,'store'])->name('cabang.store');
Route::get('/delcabang/{id}',[CabangController::class,'delcabang'])->name('delcabang');

// transaksi
Route::get('/transaksi',[TransaksiController::class,'index'])->name('transaksi');
Route::get('/transaksi/export_excel',[TransaksiController::class,'export_excel'])->name('transaksi');
Route::get('/siswa/export_excel', 'SiswaController@export_excel');
Route::post('/transaksi/store',[TransaksiController::class,'store'])->name('transaksi.store');
Route::get('/deltran/{id}',[TransaksiController::class,'deltran'])->name('deltran');
Route::post('/transaksi/{id}/update',[TransaksiController::class,'update'])->name('update');
