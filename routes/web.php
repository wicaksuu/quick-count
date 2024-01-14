<?php

use App\Http\Controllers\RouteController;
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

Route::get('/', function(){
    return view('auth.login');
});
Route::get('/halaman-error', function(){
    return back();
})->name('halaman-error');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:jj',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/setting/dprd-madiun-kab', [RouteController::class, 'settingDPRD'])->name('setting-dprd-madiunkab');
    Route::get('/setting/tps', [RouteController::class, 'settingTps'])->name('setting-tps');
    Route::get('/setting/partai', [RouteController::class, 'settingPartai'])->name('setting-partai');

    Route::get('/setting/calon/dprd/{id}', [RouteController::class, 'settingCalonDPRD'])->name('setting-calon-dprd');

    Route::get('/setting/global',[RouteController::class, 'settingGlobal'])->name('setting-global');


});
