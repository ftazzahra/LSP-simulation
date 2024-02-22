<?php

use App\Http\Controllers\BarangInvController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DasisCotnroller;
use App\Http\Controllers\DatapController;
use App\Http\Controllers\DudiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\PaymentCotnroller;
use App\Http\Controllers\PeminjamanInvController;
use App\Http\Controllers\SiswaInvController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home', [HomeController::class, 'index'])->name('homeI');
// Route::get('/data-pkl', [HomeController::class, 'datap'])->name('datap');

// ======== KAS KELAS =========
Route::resource('/data-siswa', DasisCotnroller::class);
Route::resource('/pembayaran', PaymentCotnroller::class);

//=========    PKL    =========
Route::resource('/data-pkl', DatapController::class);
Route::resource('/intern', InternController::class);
Route::resource('/dudi', DudiController::class);

//=========    Inventaris    =========
Route::resource('/peminjaman', PeminjamanInvController::class);
Route::resource('/siswaInven', SiswaInvController::class);
Route::resource('/barang', BarangInvController::class);
Route::get('test2/{id}',[PeminjamanInvController::class,'test2'])->name('test2');


// Route::get('/', function () {
//     return redirect('/home');
// });
// Route::put('/bayar/{id}/kas', [PaymentController::class, 'bayar'])->name('bayarK');
// Route::get('/createdt', [DasisCotnroller::class, 'index'])->name('createS');
// Route::post('/storedt', [DasisCotnroller::class, 'store'])->name('storeS');
// Route::get('/siswa/{id}/edit', [DasisCotnroller::class, 'edit'])->name('editS');
// Route::post('/siswa/{id}/update', [DasisCotnroller::class, 'update'])->name('updateS');
// Route::get('/siswa/{id}/hapus', [DasisCotnroller::class, 'destroy'])->name('destroyS');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

