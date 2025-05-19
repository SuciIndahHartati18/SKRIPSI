<?php

use App\Http\Controllers\Admin\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/dashboard', 'dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::controller(SiswaController::class)->group(function () {
    Route::get('/admin/siswa', 'index')->name('admin.siswa.index');
    Route::get('/admin/siswa/create', 'create')->name('admin.siswa.create');
    Route::post('/admin/siswa', 'store')->name('admin.siswa.store');

    Route::delete('/admin/siswa/{siswa}', 'destroy')->name('admin.siswa.destroy');
});
