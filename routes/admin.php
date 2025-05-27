<?php

use App\Http\Controllers\Admin\HasilSeleksiPrestasiController;
use App\Http\Controllers\Admin\KriteriaPrestasiController;
use App\Http\Controllers\Admin\NilaiPrestasiController;
use App\Http\Controllers\Admin\NormalisasiPrestasiController;

use App\Http\Controllers\Admin\HasilSeleksiTesController;
use App\Http\Controllers\Admin\KriteriaTesController;
use App\Http\Controllers\Admin\NilaiTesController;
use App\Http\Controllers\Admin\NormalisasiTesController;

use App\Http\Controllers\Admin\SiswaController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/')->group(function () {
    Route::controller(SiswaController::class)->group(function () {
        Route::get('/siswa', 'index')->name('admin.siswa.index');
        Route::get('/siswa/create', 'create')->name('admin.siswa.create');
        Route::post('/siswa', 'store')->name('admin.siswa.store');
        Route::get('/siswa/search', 'search')->name('admin.siswa.search');
    
        Route::get('/siswa/{siswa}/edit', 'edit')->name('admin.siswa.edit');
        Route::put('/siswa/{siswa}', 'update')->name('admin.siswa.update');
        Route::delete('/siswa/{siswa}', 'destroy')->name('admin.siswa.destroy');
    });

    Route::controller(HasilSeleksiPrestasiController::class)->group(function () {
        Route::get('/hasil-seleksi-prestasi', 'index')->name('admin.hasil_seleksi_prestasi.index');
        Route::get('/hasil-seleksi-prestasi/create', 'create')->name('admin.hasil_seleksi_prestasi.create');
        Route::post('/hasil-seleksi-prestasi', 'store')->name('admin.hasil_seleksi_prestasi.store');
    
        Route::delete('/hasil-seleksi-prestasi/{hasilSeleksiPrestasi}', 'destroy')->name('admin.hasil_seleksi_prestasi.destroy');
    });

    Route::controller(HasilSeleksiTesController::class)->group(function () {
        Route::get('/hasil-seleksi-tes', 'index')->name('admin.hasil_seleksi_tes.index');
        Route::get('/hasil-seleksi-tes/create', 'create')->name('admin.hasil_seleksi_tes.create');
        Route::post('/hasil-seleksi-tes', 'store')->name('admin.hasil_seleksi_tes.store');
    
        Route::delete('/hasil-seleksi-tes/{hasilSeleksiTes}', 'destroy')->name('admin.hasil_seleksi_tes.destroy');
    });

    Route::controller(NilaiPrestasiController::class)->group(function () {
        Route::get('/nilai-prestasi', 'index')->name('admin.nilai_prestasi.index');
        Route::get('/nilai-prestasi/create', 'create')->name('admin.nilai_prestasi.create');
        Route::post('/nilai-prestasi', 'store')->name('admin.nilai_prestasi.store');
        
        // Route::get('/kriteria-prestasi/{siswaId}', 'getKriteriaPrestasi');
        Route::delete('/nilai-prestasi/{nilaiPrestasi}', 'destroy')->name('admin.nilai_prestasi.destroy');

    });

    Route::controller(NilaiTesController::class)->group(function () {
        Route::get('/nilai-tes', 'index')->name('admin.nilai_tes.index');
        Route::get('/nilai-tes/create', 'create')->name('admin.nilai_tes.create');
        Route::post('/nilai-tes', 'store')->name('admin.nilai_tes.store');
    
        Route::delete('/nilai-tes/{nilaiTes}', 'destroy')->name('admin.nilai_tes.destroy');
    });

    Route::controller(KriteriaTesController::class)->group(function () {
        Route::get('/kriteria-tes', 'index')->name('admin.kriteria_tes.index');
        Route::get('/kriteria-tes/create', 'create')->name('admin.kriteria_tes.create');
        Route::post('/kriteria-tes', 'store')->name('admin.kriteria_tes.store');
    
        Route::delete('/kriteria-tes/{nilaiPrestasi}', 'destroy')->name('admin.kriteria_tes.destroy');
    });

    Route::controller(KriteriaPrestasiController::class)->group(function () {
        Route::get('/kriteria-prestasi', 'index')->name('admin.kriteria_prestasi.index');
        Route::get('/kriteria-prestasi/create', 'create')->name('admin.kriteria_prestasi.create');
        Route::post('/kriteria-prestasi', 'store')->name('admin.kriteria_prestasi.store');
    
        Route::delete('/kriteria-prestasi/{kriteriaPrestasi}', 'destroy')->name('admin.kriteria_prestasi.destroy');
    });

    Route::controller(NormalisasiPrestasiController::class)->group(function () {
        Route::get('/normalisasi-prestasi', 'index')->name('admin.normalisasi_prestasi.index');
        Route::get('/normalisasi-prestasi/create', 'create')->name('admin.normalisasi_prestasi.create');
        Route::post('/normalisasi-prestasi', 'store')->name('admin.normalisasi_prestasi.store');
    
        Route::delete('/normalisasi-prestasi/{normalisasiPrestasi}', 'destroy')->name('admin.normalisasi_prestasi.destroy');
    });

    Route::controller(NormalisasiTesController::class)->group(function () {
        Route::get('/normalisasi-tes', 'index')->name('admin.normalisasi_tes.index');
        Route::get('/normalisasi-tes/create', 'create')->name('admin.normalisasi_tes.create');
        Route::post('/normalisasi-tes', 'store')->name('admin.normalisasi_tes.store');
    
        Route::delete('/normalisasi-tes/{normalisasiTes}', 'destroy')->name('admin.normalisasi_tes.destroy');
    });
});
