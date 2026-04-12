<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjekController;
use App\Http\Controllers\PortoController;
use Illuminate\Support\Facades\Route;

Route::get('/',  [PortoController::class, 'welcome'])
    ->name('welcome');

Route::get('/skripsi', [PortoController::class, 'skripsi'])
    ->name('services.skripsi');

Route::get('/kerja-praktek', [PortoController::class, 'kerjaPraktek'])
    ->name('services.kerja-praktek');

Route::get('/custom-web', [PortoController::class, 'customWeb'])
    ->name('services.custom-web');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/portofolio', [PortoController::class, 'index'])
    ->name('portofolio');
Route::get('/api/github', [PortoController::class, 'stats']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::resource('projek', ProjekController::class);
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::resource('keuangan', KeuanganController::class);
    Route::get('keuangan/export/pdf', [KeuanganController::class, 'exportPdf'])->name('keuangan.export.pdf');
    Route::get('pengeluaran/export/pdf', [PengeluaranController::class, 'exportPdf'])->name('pengeluaran.export.pdf');
    Route::delete('/dashboard/cleanup', [DashboardController::class, 'cleanupOldData'])->name('dashboard.cleanup');

});



require __DIR__.'/auth.php';
