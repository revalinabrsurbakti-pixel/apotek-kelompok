<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PelangganApiController;
use App\Http\Controllers\Api\StafApotekApiController;
use App\Http\Controllers\Api\DaftarObatApiController;

Route::apiResource('pelanggans', PelangganApiController::class);

Route::apiResource('staf-apoteks', StafApotekApiController::class);

Route::apiResource('daftar-obats', DaftarObatApiController::class);
