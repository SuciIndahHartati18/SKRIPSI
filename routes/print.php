<?php

use App\Http\Controllers\Cetak\HasilSeleksiPrestasiLulusController;
use App\Http\Controllers\Cetak\SiswaController;
use Illuminate\Support\Facades\Route;

Route::prefix('print')->group(function () {
    Route::controller(SiswaController::class)->group(function () {
        Route::get('/siswa/preview', 'preview')->name('print.siswa.preview');
        Route::get('/siswa/print', 'printPdf')->name('print.siswa.print');
    });

    Route::controller(HasilSeleksiPrestasiLulusController::class)->group(function () {
        Route::get('/hasil-seleksi-prestasi-lulus/preview', 'preview')->name('print.hasil_seleksi_prestasi_lulus.preview');
        Route::get('/hasil-seleksi-prestasi-lulus/print', 'exportPdf')->name('print.hasil_seleksi_prestasi_lulus.print');
    });
});