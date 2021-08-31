<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\TagihanController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'auth'])->name('/');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// admin

Route::group(['middleware' => ['role:bendahara']], function () {

    // kelola semester
    Route::get('/semester', [SemesterController::class, 'index'])->name('semester');
    Route::post('/semester/store', [SemesterController::class, 'store'])->name('semester.store');
    Route::get('/semester/edit/{id}', [SemesterController::class, 'edit'])->name('semester/edit');
    Route::POST('/semester/update/', [SemesterController::class, 'update'])->name('semester.update');
    Route::POST('/semester/hapus/', [SemesterController::class, 'hapus'])->name('semester.hapus');


    // kelola tagihan
    Route::get('/tagihan', [TagihanController::class, 'index'])->name('semester');
    Route::post('/tagihan/store', [TagihanController::class, 'store'])->name('tagihan.store');
    Route::get('/tagihan/edit/{id}', [TagihanController::class, 'edit'])->name('tagihan/edit');
    Route::POST('/tagihan/update/', [TagihanController::class, 'update'])->name('tagihan.update');
    Route::POST('/tagihan/hapus/', [TagihanController::class, 'hapus'])->name('tagihan.hapus');
});
