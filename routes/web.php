<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UsersController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('index');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.proses');
    Route::post('/register', [LoginController::class, 'store'])->name('register.proses');
    
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('/users', UsersController::class);
    Route::resource('/laporan', LaporanController::class);
    Route::resource('/nilai', NilaiController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});
