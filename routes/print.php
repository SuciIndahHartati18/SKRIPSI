<?php

use App\Http\Controllers\Cetak\HasilSeleksiPrestasiLulusController;
use App\Http\Controllers\Cetak\SiswaController;
use Illuminate\Support\Facades\Route;

Route::prefix('print')->group(function () {
    Route::controller(SiswaController::class)->group(function () {
        Route::get('/siswa/preview', 'preview')->name('print.siswa.preview');
        Route::get('/siswa/print', 'printPdf')->name('print.siswa.print');
    });
});