<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\domisili;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\SkuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Penduduk\PengajuanSuratController;
use App\Http\Controllers\Guest\SuratController;
use App\Http\Controllers\Kades\PersetujuanSuratController;
use App\Http\Controllers\Admin\PengaturanDesaController;
use App\Http\Controllers\Admin\PengaturanSuratController;
use App\Http\Controllers\Admin\KelolaPendudukController;

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

Route::controller(SuratController::class)->group(function () {
    Route::get('/surat/show/{surat}', 'show')->name('surat.show');
});

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
    Route::middleware('role:penduduk')->group(function () {
        Route::name('penduduk.')->group(function () {
            Route::prefix('/penduduk')->group(function () {
                Route::controller(PengajuanSuratController::class)->group(function () {
                    Route::get('/pengajuan-surat', 'index')->name('pengajuanSurat.index');
                    Route::get('/pengajuan-surat/create', 'surat')->name('pengajuanSurat.surat');
                    Route::get('/pengajuan-surat/create/{surat}', 'create')->name('pengajuanSurat.create');
                    Route::post('/pengajuan-surat/store', 'store')->name('pengajuanSurat.store');
                    Route::get('/pengajuan-surat/show/{surat}', 'show')->name('pengajuanSurat.show');
                    Route::get('/pengajuan-surat/cetak/{surat}', 'cetak')->name('pengajuanSurat.cetak');
                });
            });
        });
    });
    Route::middleware('role:kades')->group(function () {
        Route::name('kades.')->group(function () {
            Route::prefix('/kades')->group(function () {
                Route::controller(PersetujuanSuratController::class)->group(function () {
                    Route::get('/persetujuan-surat', 'index')->name('persetujuanSurat.index');
                    Route::patch('/persetujuan-surat/setujui', 'setujui')->name('persetujuanSurat.setujui');
                    Route::patch('/persetujuan-surat/tolak', 'tolak')->name('persetujuanSurat.tolak');
                });
            });
        });
    });
    Route::middleware('role:admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::prefix('/admin')->group(function () {
                Route::controller(PengaturanDesaController::class)->group(function () {
                    Route::get('/desa', 'index')->name('desa.index');
                    Route::put('/desa/update/{desa}', 'update')->name('desa.update');
                });
                Route::controller(PengaturanSuratController::class)->group(function () {
                    Route::get('/surat', 'index')->name('surat.index');
                    Route::post('/surat/store', 'store')->name('surat.store');
                    Route::get('/surat/{surat}/edit', 'edit')->name('surat.edit');
                    Route::put('/surat/{surat}', 'update')->name('surat.update');
                    Route::get('/surat/{surat}', 'show')->name('surat.show');
                    Route::post('/surat/kolomSurat', 'storeKolom')->name('surat.kolom.store');
                    Route::delete('/surat/kolomSurat/{id}', 'destroyKolom')->name('surat.kolom.destroy');
                });
                Route::controller(KelolaPendudukController::class)->group(function () {
                    Route::get('/penduduk', 'index')->name('penduduk.index');
                    Route::get('/penduduk/create', 'create')->name('penduduk.create');
                    Route::post('/penduduk/store', 'store')->name('penduduk.store');
                    Route::get('/penduduk/{penduduk}/edit', 'edit')->name('penduduk.edit');
                    Route::put('/penduduk/{penduduk}', 'update')->name('penduduk.update');
                    Route::get('/penduduk/{penduduk}', 'show')->name('penduduk.show');
                    Route::delete('/penduduk/{penduduk}', 'destroy')->name('penduduk.destroy');
                });
            });
        });
    });
});
// Route::get('/admin/dashboard', [dashboardcontroller::class, 'dashboardoperator']);
// Route::get('/warga/dashboard', [dashboardcontroller::class, 'dashboardwarga']);
// Route::get('/warga/Pengajuan_surat_jenis', [dashboardcontroller::class, 'pengajuan_surat']);

// Route::get('/warga/Pengajuan_surat_domisili', [domisili::class, 'index']);
// Route::post('/warga/Pengajuan_surat_domisili/simpan', [domisili::class, 'store'])->name('domisili.store');
// Route::get('/warga/Pengajuan_surat_domisili/print/{id}', [domisili::class, 'print']);
// Route::delete('/warga/Pengajuan_surat_domisili/hapus/{id}', [domisili::class, 'destroy']);

// //skudashboard
// Route::get('/warga/Pengajuan_surat_sku', [SKuController::class, 'index']);
// Route::post('/warga/Pengajuan_surat_sku/simpan', [SKuController::class, 'store'])->name('sku.store');
// Route::get('/warga/Pengajuan_surat_sku/print/{id}', [SKuController::class, 'print']);
// Route::delete('/warga/Pengajuan_surat_sku/hapus/{id}', [SKuController::class, 'destroy']);

// //kelahiran
// Route::get('/warga/Pengajuan_surat_kelahiran', [KelahiranController::class, 'index']);
// Route::post('/warga/Pengajuan_surat_kelahiran/simpan', [KelahiranController::class, 'store'])->name('kelahiran.store');
// Route::get('/warga/Pengajuan_surat_kelahiran/print/{id}', [KelahiranController::class, 'print']);
// Route::delete('/warga/Pengajuan_surat_kelahiran/hapus/{id}', [KelahiranController::class, 'destroy']);

// //kematian
// Route::get('/warga/Pengajuan_surat_kematian', [KelahiranController::class, 'index']);
// Route::post('/warga/Pengajuan_surat_kematian/simpan', [KelahiranController::class, 'store'])->name('kelahiran.store');
// Route::get('/warga/Pengajuan_surat_kematian/print/{id}', [KelahiranController::class, 'print']);
// Route::delete('/warga/Pengajuan_surat_kematian/hapus/{id}', [KelahiranController::class, 'destroy']);

// Route::get('/kelola_kategori/hide/data', [pengajuansuratcontroller::class, 'data'])->name('kategori.data');
// Route::resource('/kelola_kategori', pengajuansuratcontroller::class);
// Route::post('/kelola_kategori/store', [pengajuansuratcontroller::class, 'store'])->name('kategori.store');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::middleware('auth', 'role:admin', 'role:penduduk')->group(function () {
//     Route::patch('/profile-kaur', 'dashboardcontroller@dashboardKades')->name('halaman-penduduk');
// });

// // Route::middleware('auth', 'role:admin', 'role:admin')->group(function () {
// //     Route::get('/dashboard-kades', 'dashboardcontroller@dashboardopareator')->name('halaman-kaur-tata-usaha');
// // });

// Route::middleware('auth', 'role:admin', 'role:kades')->group(function () {
//     Route::patch('/profile-kaur', 'dashboardcontroller@dashboardKades')->name('halaman-kades');
// });
require __DIR__ . '/auth.php';
