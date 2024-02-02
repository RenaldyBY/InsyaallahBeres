<?php

use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\domisili;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\SkuController;
use App\Http\Controllers\pengajuansuratcontroller;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

  Route::get('/admin/dashboard', [dashboardcontroller::class, 'dashboardoperator']);
  Route::get('/warga/dashboard', [dashboardcontroller::class, 'dashboardwarga']);
  Route::get('/warga/Pengajuan_surat_jenis', [dashboardcontroller::class, 'pengajuan_surat']);

  Route::get('/warga/Pengajuan_surat_domisili', [domisili::class, 'index']);
  Route::post('/warga/Pengajuan_surat_domisili/simpan', [domisili::class, 'store'])->name('domisili.store');
  Route::get('/warga/Pengajuan_surat_domisili/print/{id}',[domisili::class, 'print']);
  Route::delete('/warga/Pengajuan_surat_domisili/hapus/{id}',[domisili::class, 'destroy']);


  //skudashboard
  Route::get('/warga/Pengajuan_surat_sku', [SKuController::class, 'index']);
  Route::post('/warga/Pengajuan_surat_sku/simpan', [SKuController::class, 'store'])->name('sku.store');
  Route::get('/warga/Pengajuan_surat_sku/print/{id}',[SKuController::class, 'print']);
  Route::delete('/warga/Pengajuan_surat_sku/hapus/{id}',[SKuController::class, 'destroy']);

  //kelahiran
  Route::get('/warga/Pengajuan_surat_kelahiran', [KelahiranController::class, 'index']);
  Route::post('/warga/Pengajuan_surat_kelahiran/simpan', [KelahiranController::class, 'store'])->name('kelahiran.store');
  Route::get('/warga/Pengajuan_surat_kelahiran/print/{id}',[KelahiranController::class, 'print']);
  Route::delete('/warga/Pengajuan_surat_kelahiran/hapus/{id}',[KelahiranController::class, 'destroy']);

  //kematian
  Route::get('/warga/Pengajuan_surat_kematian', [KelahiranController::class, 'index']);
  Route::post('/warga/Pengajuan_surat_kematian/simpan', [KelahiranController::class, 'store'])->name('kelahiran.store');
  Route::get('/warga/Pengajuan_surat_kematian/print/{id}',[KelahiranController::class, 'print']);
  Route::delete('/warga/Pengajuan_surat_kematian/hapus/{id}',[KelahiranController::class, 'destroy']);

  Route::get('/kelola_kategori/hide/data', [pengajuansuratcontroller::class, 'data'])->name('kategori.data');
  Route::resource('/kelola_kategori', pengajuansuratcontroller::class);
  Route::post('/kelola_kategori/store', [pengajuansuratcontroller::class, 'store'])->name('kategori.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'role:admin', 'role:penduduk')->group(function () {
    Route::patch('/profile-kaur', 'dashboardcontroller@dashboardKades')->name('halaman-penduduk');
});

// Route::middleware('auth', 'role:admin', 'role:admin')->group(function () {
//     Route::get('/dashboard-kades', 'dashboardcontroller@dashboardopareator')->name('halaman-kaur-tata-usaha');
// });

Route::middleware('auth', 'role:admin', 'role:kades')->group(function () {
    Route::patch('/profile-kaur', 'dashboardcontroller@dashboardKades')->name('halaman-kades');
});
require __DIR__.'/auth.php';
