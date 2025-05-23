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

Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

require __DIR__. '/admin.php' ;