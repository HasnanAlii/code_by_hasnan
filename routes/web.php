<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjekController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

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
