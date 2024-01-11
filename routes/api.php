<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\region\WilayahController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware([
    config('jetstream.auth_session'),
])->group(function () {
    Route::get('/provinsi', [WilayahController::class, 'getProvinsi']);
    Route::get('/kota/{provinsi_id}', [WilayahController::class, 'getKota']);
    Route::get('/kecamatan/{kota_id}', [WilayahController::class, 'getKecamatan']);
    Route::get('/desa/{kecamatan_id}', [WilayahController::class, 'getDesa']);
});