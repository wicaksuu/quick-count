<?php

use App\Http\Controllers\RouteController;
use App\Models\wilayah\kecamatan;
use Illuminate\Support\Facades\Auth;
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
    'isDumy:false'
])->group(function () {
    Route::get('/export/{type}/{tps_dapil}/{opsi}', [RouteController::class, 'export'])->name('export');
    Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isDumy:false'
])->group(function () {
    Route::get('/bupati', function(){
        if (json_decode(Auth::user()->role)) {
            $user_role = Auth::user()->role;
            $user_data = json_decode($user_role,true);
            $kecamatan_id = $user_data['kecamatan_id'];
            $kecamatan = kecamatan::with('desas')->find($kecamatan_id);}
        return view('bupati',compact('kecamatan'));
    })->name('bupati');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin',
    'isDumy:false'
])->group(function () {


    Route::get('/daftar/tps', [RouteController::class, 'daftarTps'])->name('daftar-tps');
    Route::get('/setting/tps', [RouteController::class, 'settingTps'])->name('setting-tps');
    Route::get('/setting/kecamatan', [RouteController::class, 'settingKecamatan'])->name('setting-kecamatan');
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


    // Route::get('/dashboard/presiden', [RouteController::class, 'Overview'])->name('dashboard-presiden');
    // Route::get('/dashboard/dpr/ri', [RouteController::class, 'Overview'])->name('dashboard-dpr-ri');
    // Route::get('/dashboard/dpd/ri', [RouteController::class, 'Overview'])->name('dashboard-dpd-ri');
    // Route::get('/dashboard/dprd/provinsi', [RouteController::class, 'Overview'])->name('dashboard-dprd-provinsi');
    // Route::get('/dashboard/dprd-madiun-kab', [RouteController::class, 'Overview'])->name('dashboard-dprd-madiunkab');
    // Route::get('/dashboard/gubernur', [RouteController::class, 'Overview'])->name('dashboard-gubernur');
    // Route::get('/dashboard/bupati', [RouteController::class, 'Overview'])->name('dashboard-bupati');
    // Route::get('/dashboard/walikota', [RouteController::class, 'Overview'])->name('dashboard-walikota');
    Route::get('/dashboard/{id}', [RouteController::class, 'Overview'])->name('dashboard-over-view');
    Route::get('/dapil/view/{id}', [RouteController::class, 'DapilView'])->name('view-calon-dprd');



});
