<?php

use App\Http\Controllers\Admin\NilaiSiswaController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nilai/create', [NilaiSiswaController::class, 'create'])->name('nilai.create');
Route::post('/nilai', [NilaiSiswaController::class, 'store'])->name('nilai.store');

require __DIR__. '/auth.php';
require __DIR__. '/admin.php' ;