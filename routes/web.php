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
    'role:admin',
    'isDumy:false'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/setting/tps', [RouteController::class, 'settingTps'])->name('setting-tps');
    Route::get('/setting/partai', [RouteController::class, 'settingPartai'])->name('setting-partai');
    Route::get('/setting/global',[RouteController::class, 'settingGlobal'])->name('setting-global');



    Route::get('/setting/calon/presiden/{id}', [RouteController::class, 'settingCalon'])->name('setting-calon-presiden');
    Route::get('/setting/calon/dpr/ri/{id}', [RouteController::class, 'settingCalon'])->name('setting-calon-dpr-ri');
    Route::get('/setting/calon/dpd/ri/{id}', [RouteController::class, 'settingCalon'])->name('setting-calon-dpd-ri');
    Route::get('/setting/calon/dprd/provinsi/{id}', [RouteController::class, 'settingCalon'])->name('setting-calon-dprd-provinsi');
    Route::get('/setting/calon/dprd/{id}', [RouteController::class, 'settingCalon'])->name('setting-calon-dprd');
    Route::get('/setting/calon/gubernur/{id}', [RouteController::class, 'settingCalon'])->name('setting-calon-gubernur');
    Route::get('/setting/calon/bupati/{id}', [RouteController::class, 'settingCalon'])->name('setting-calon-bupati');
    Route::get('/setting/calon/walikota/{id}', [RouteController::class, 'settingCalon'])->name('setting-calon-walikota');



    Route::get('/setting/presiden', [RouteController::class, 'settingDPRD'])->name('setting-presiden');
    Route::get('/setting/dpr/ri', [RouteController::class, 'settingDPRD'])->name('setting-dpr-ri');
    Route::get('/setting/dpd/ri', [RouteController::class, 'settingDPRD'])->name('setting-dpd-ri');
    Route::get('/setting/dprd/provinsi', [RouteController::class, 'settingDPRD'])->name('setting-dprd-provinsi');
    Route::get('/setting/dprd-madiun-kab', [RouteController::class, 'settingDPRD'])->name('setting-dprd-madiunkab');
    Route::get('/setting/gubernur', [RouteController::class, 'settingDPRD'])->name('setting-gubernur');
    Route::get('/setting/bupati', [RouteController::class, 'settingDPRD'])->name('setting-bupati');
    Route::get('/setting/walikota', [RouteController::class, 'settingDPRD'])->name('setting-walikota');


    Route::get('/dashboard/presiden', [RouteController::class, 'settingDPRD'])->name('dashboard-presiden');
    Route::get('/dashboard/dpr/ri', [RouteController::class, 'settingDPRD'])->name('dashboard-dpr-ri');
    Route::get('/dashboard/dpd/ri', [RouteController::class, 'settingDPRD'])->name('dashboard-dpd-ri');
    Route::get('/dashboard/dprd/provinsi', [RouteController::class, 'settingDPRD'])->name('dashboard-dprd-provinsi');
    Route::get('/dashboard/dprd-madiun-kab', [RouteController::class, 'settingDPRD'])->name('dashboard-dprd-madiunkab');
    Route::get('/dashboard/gubernur', [RouteController::class, 'settingDPRD'])->name('dashboard-gubernur');
    Route::get('/dashboard/bupati', [RouteController::class, 'settingDPRD'])->name('dashboard-bupati');
    Route::get('/dashboard/walikota', [RouteController::class, 'settingDPRD'])->name('dashboard-walikota');

});
