<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StafApotekController;
use App\Http\Controllers\DaftarObatController;

Route::get('/', function () {
    return redirect('/pelanggan');
});

Route::get('/pelanggan', [PelangganController::class, 'index'])
    ->name('pelanggan.index');

Route::post('/pelanggan', [PelangganController::class, 'store'])
    ->name('pelanggan.store');

Route::get('/staf', function () {
    return view('staf.index');
})->name('staf.index');

Route::post('/staf', [StafApotekController::class, 'store'])
    ->name('staf.store');

Route::get('/obat', function () {
    return view('obat.index');
})->name('obat.index');

Route::post('/obat', [DaftarObatController::class, 'store'])
    ->name('obat.store');
