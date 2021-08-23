<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\c_outlet;
use App\Http\Controllers\c_metode_pembayaran;
use App\Http\Controllers\c_layanan;
use App\Http\Controllers\c_customer;
use App\Http\Controllers\c_transaksi;
use App\Http\Controllers\c_transaksi_by_outlet;
use App\Http\Controllers\c_transaksi_by_customer;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('outlet', c_outlet::class);
    Route::resource('metodepembayaran', c_metode_pembayaran::class);
    Route::resource('layanan', c_layanan::class);
    Route::resource('customer', c_customer::class);
    Route::resource('transaksi', c_transaksi::class);
    Route::resource('transaksibyoutlet',c_transaksi_by_outlet::class);
    Route::resource('transaksibycustomer',c_transaksi_by_customer::class);
});
