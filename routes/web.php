<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PelangganController;
Route::resource('pelanggan', PelangganController::class);
use App\Http\Controllers\BukuController;
Route::resource('buku', BukuController::class);
use App\Http\Controllers\TransaksiController;
Route::resource('transaksi', TransaksiController::class);