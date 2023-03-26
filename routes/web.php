<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BerandaGuru;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaSiswa;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PilihanGandaController;

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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();


Route::prefix('guru')->middleware(['auth','auth.guru'])->group(function(){
    Route::get('beranda', [BerandaGuru::class, 'index'])->name('guru.index');
    Route::get('penilaian', [PenilaianController::class, 'index'])->name('penilaian');
    Route::get('penilaian/{id}/{idk}',[PenilaianController::class, 'show'])->name('guru.nilai');


});
Route::prefix('siswa')->middleware(['auth','auth.siswa'])->group(function(){
    Route::get('beranda', [BerandaSiswa::class, 'index'])->name('siswa.index');
    
});
Route::prefix('admin')->middleware(['auth','auth.admin'])->group(function(){
    Route::get('beranda', [AdminController::class, 'index'])->name('admin.index');
    Route::get('daftar_guru', [AdminController::class, 'getGuru'])->name('admin.daftar_guru');
    Route::get('daftar_siswa', [AdminController::class, 'getSiswa'])->name('admin.daftar_siswa');
    Route::get('form', [AdminController::class, 'create'])->name('admin.create');
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('store', [AdminController::class, 'store'])->name('admin.store');
    Route::post('update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('delete', [AdminController::class, 'delete'])->name('admin.delete');

    #mapel admin

});

    //ROute untuk mata pelajaran
    Route::get('mapel', [MapelController::class, 'index'])->name('mapel.index');
    Route::get('mapel/edit/{id_mapel}', [MapelController::class, 'show'])->name('mapel.edit');
    Route::get('mapel/form', [MapelController::class, 'create'])->name('mapel.create');
    Route::post('mapel/store', [MapelController::class, 'store'])->name('mapel.store');
    Route::get('mapel/delete', [MapelController::class, 'destroy'])->name('mapel.delete');
    Route::post('mapel/update/{id_mapel}', [MapelController::class, 'update'])->name('mapel.update');
    
    //Route untuk Soal
    Route::get('mapel/soal', [SoalController::class, 'index'])->name('soal.index');
    Route::get('mapel/soal/form', [SoalController::class, 'create'])->name('mapel.soal.create');
    Route::get('mapel/soal/{id}', [SoalController::class, 'detail'])->name('mapel.soal');
    Route::post('mapel/soal/store', [SoalController::class, 'store'])->name('soal.store');
    Route::get('mapel/soal/{user}/{id}/{idm}',[SoalController::class, 'edit'])->name('mapel.soal.edit');
    Route::post('mapel/soal/update/{id}/{idm}', [SoalController::class, 'update'])->name('mapel.soal.update');

    //route soal pilihan ganda
    Route::get('mapel/soal/Pilihan', [PilihanGandaController::class, 'index'])->name('soal.index.pilgan');
    Route::get('mapel/soal/form/Pilihan', [PilihanGandaController::class, 'create'])->name('soal.create.pilgan');
    Route::post('mapel/soal/store/Pilihan', [PilihanGandaController::class, 'store'])->name('soal.store.pilgan');
    Route::get('mapel/soal/Pilihan/{user}/{id}/{idm}', [PilihanGandaController::class, 'show'])->name('soal.show.pilgan');
    
    //Route Untuk jawaban essay
    Route::post('jawaban/{user}/{id}/{idm}', [JawabanController::class, 'store'])->name('jawaban.store');
    Route::get('jawaban/{user}/{id}/{id_user}',[BerandaSiswa::class, 'cek'])->name('jawaban.cek');

    //Route Jawaban Pilihan Ganda
    Route::post('jawaban/pilihan/{user_id}/{id}/{idm}', [JawabanController::class, 'simpan'])->name('jawaban.pilihan.simpan');

Route::get('logout' , [LoginController::class, 'logout'])->name('logout');

Route::get('beranda', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
