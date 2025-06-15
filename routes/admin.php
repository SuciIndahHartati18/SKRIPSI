<?php

use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\HasilSeleksiPrestasiController;
use App\Http\Controllers\Admin\KriteriaPrestasiController;
use App\Http\Controllers\Admin\NilaiPrestasiController;
use App\Http\Controllers\Admin\NormalisasiPrestasiController;

use App\Http\Controllers\Admin\HasilSeleksiTesController;
use App\Http\Controllers\Admin\KriteriaTesController;
use App\Http\Controllers\Admin\NilaiTesController;
use App\Http\Controllers\Admin\NormalisasiTesController;
use App\Http\Controllers\Admin\RankingController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\PerhitunganJalurPrestasiController;
use App\Http\Controllers\PerhitunganJalurTesController;

use Illuminate\Support\Facades\Route;

Route::prefix('admin/')->middleware('auth')->group(function () {
    Route::controller(SiswaController::class)->group(function () {
        Route::get('/siswa', 'index')->name('admin.siswa.index');
        Route::get('/siswa/create', 'create')->name('admin.siswa.create');
        Route::post('/siswa', 'store')->name('admin.siswa.store');
        Route::get('/siswa/search', 'search')->name('admin.siswa.search');
    
        Route::get('/siswa/{siswa}/edit', 'edit')->name('admin.siswa.edit');
        Route::put('/siswa/{siswa}', 'update')->name('admin.siswa.update');
        Route::delete('/siswa/{siswa}', 'destroy')->name('admin.siswa.destroy');
    });

    Route::controller(KriteriaPrestasiController::class)->group(function () {
        Route::get('/kriteria-prestasi', 'index')->name('admin.kriteria_prestasi.index');
        Route::get('/kriteria-prestasi/create', 'create')->name('admin.kriteria_prestasi.create');
        Route::post('/kriteria-prestasi', 'store')->name('admin.kriteria_prestasi.store');
        Route::get('/kriteria-prestasi/search', 'search')->name('admin.kriteria_prestasi.search');
    
        Route::get('/kriteria-prestasi/{kriteriaPrestasi}/edit', 'edit')->name('admin.kriteria_prestasi.edit');
        Route::post('/kriteria-prestasi/{kriteriaPrestasi}', 'update')->name('admin.kriteria_prestasi.update');
        Route::delete('/kriteria-prestasi/{kriteriaPrestasi}', 'destroy')->name('admin.kriteria_prestasi.destroy');
    });

    Route::controller(KriteriaTesController::class)->group(function () {
        Route::get('/kriteria-tes', 'index')->name('admin.kriteria_tes.index');
        Route::get('/kriteria-tes/create', 'create')->name('admin.kriteria_tes.create');
        Route::post('/kriteria-tes', 'store')->name('admin.kriteria_tes.store');
    
        Route::get('/kriteria-tes/{kriteriaTes}/edit', 'edit')->name('admin.kriteria_tes.edit');
        Route::put('/kriteria-tes/{kriteriaTes}', 'update')->name('admin.kriteria_tes.update');
        Route::delete('/kriteria-tes/{kriteriaTes}', 'destroy')->name('admin.kriteria_tes.destroy');
    });

    Route::controller(PerhitunganJalurPrestasiController::class)->group(function () {
        Route::get('/perhitungan-jalur-prestasi', 'index')->name('admin.perhitungan_jalur_prestasi.index');
    });

    Route::controller(PerhitunganJalurTesController::class)->group(function () {
        Route::get('/perhitungan-jalur-tes', 'index')->name('admin.perhitungan_jalur_tes.index');
    });

    /*
    Route::controller(RankingController::class)->group(function () {
        Route::get('/ranking', 'index')->name('admin.ranking.index');
        Route::get('/ranking/create', 'create')->name('admin.ranking.create');
        Route::post('/ranking', 'store')->name('admin.ranking.store');

        Route::get('/ranking/filter', 'filterByTahunAjaran')->name('admin.ranking.filter');

        Route::get('/ranking/update-ranking', 'showUpdateForm')->name('admin.ranking.showUpdateForm');
        Route::post('/ranking/update-ranking', 'updateRanking')->name('admin.ranking.updateRanking');
    });
    */

    Route::controller(AkunController::class)->group(function () {
        Route::get('/akun/{user}/edit', 'edit')->name('admin.akun.edit');
        Route::put('/akun/{user}', 'update')->name('admin.akun.update');
    });

    Route::controller(HasilSeleksiPrestasiController::class)->group(function () {
        Route::get('/hasil-seleksi-prestasi', 'index')->name('admin.hasil_seleksi_prestasi.index');
        Route::get('/hasil-seleksi-prestasi/create', 'create')->name('admin.hasil_seleksi_prestasi.create');
        Route::post('/hasil-seleksi-prestasi', 'store')->name('admin.hasil_seleksi_prestasi.store');
    
        Route::delete('/hasil-seleksi-prestasi/{hasilSeleksiPrestasi}', 'destroy')->name('admin.hasil_seleksi_prestasi.destroy');
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

    Route::controller(HasilSeleksiTesController::class)->group(function () {
        Route::get('/hasil-seleksi-tes', 'index')->name('admin.hasil_seleksi_tes.index');
        Route::get('/hasil-seleksi-tes/create', 'create')->name('admin.hasil_seleksi_tes.create');
        Route::post('/hasil-seleksi-tes', 'store')->name('admin.hasil_seleksi_tes.store');

        Route::get('/hasil-seleksi-tes/edit-ranking', 'editRanking')->name('admin.hasil_seleksi_tes.editRanking');
        Route::put('/hasil-seleksi-tes/update-ranking', 'updateRanking')->name('admin.hasil_seleksi_tes.updateRanking');
        Route::get('/hasil-seleksi-tes/preview', 'preview')->name('admin.hasil_seleksi_tes.preview');
        Route::get('/hasil-seleksi-tes/print', 'print')->name('admin.hasil_seleksi_tes.print');
    
        Route::delete('/hasil-seleksi-tes/{hasilSeleksiTes}', 'destroy')->name('admin.hasil_seleksi_tes.destroy');
    });
});
