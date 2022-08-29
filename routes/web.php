<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PembayaranSppController;
use App\Http\Controllers\SchoolEventController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// autenticate
Route::get('/login', [UserController::class, 'login'])->name('auth.loginForm')->middleware('guest');
Route::post('/try-login', [UserController::class, 'loginAttempt'])->name('auth.loginAttempt')->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->name('auth.registerForm')->middleware('guest');
Route::post('/create-user', [UserController::class, 'store'])->name('auth.create_user');
Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout')->middleware('auth');

//dashboard mapel
Route::get('/dashboard/mata-pelajaran', [MapelController::class, 'index'])->name('auth.mapel.all')->middleware('auth');
Route::get('/dashboard/mata-pelajaran/tambah', [MapelController::class, 'create'])->name('auth.mapel.create')->middleware('auth');
Route::post('/dashboard/mata-pelajaran/store', [MapelController::class, 'store'])->name('auth.mapel.store')->middleware('auth');
Route::get('/dashboard/mata-pelajaran/edit/{mapel}', [MapelController::class, 'update'])->name('auth.mapel.edit')->middleware('auth');
Route::patch('/dashboard/mata-pelajaran/patch/{mapel}', [MapelController::class, 'patch'])->name('auth.mapel.patch')->middleware('auth');
Route::delete('/dashboard/mata-pelajaran/delete/{mapel}', [MapelController::class, 'delete'])->name('auth.mapel.delete')->middleware('auth');
Route::get('/dashboard/mata-pelajaran/{mapel}', [MapelController::class, 'detail'])->name('auth.mapel.detail');

//kegiatan acara
Route::get('/dashboard/kegiatan', [SchoolEventController::class, 'index'])->name('auth.schoolEvent.all');
Route::get('/dashboard/kegiatan/tambah', [SchoolEventController::class, 'create'])->name('auth.schoolEvent.create')->middleware('auth');
Route::post('/dashboard/kegiatan/store', [SchoolEventController::class, 'store'])->name('auth.schoolEvent.store')->middleware('auth');
Route::get('/dashboard/kegiatan/detail/{schoolEvent}', [SchoolEventController::class, 'detail'])->name('auth.schoolEvent.detail');
Route::get('/dashboard/kegiatan/edit/{schoolEvent}', [SchoolEventController::class, 'edit'])->name('auth.schoolEvent.edit')->middleware('auth');
Route::patch('/dashboard/kegiatan/patch/{schoolEvent}', [SchoolEventController::class, 'patch'])->name('auth.schoolEvent.patch')->middleware('auth');
Route::delete('/kegiatan/delete/{schoolEvent}', [SchoolEventController::class, 'delete'])->name('auth.schoolEvent.delete')->middleware('auth');

//manajemen user
Route::get('/dashboard/manajemen-akun', [UserController::class, 'allUser'])->name('auth.manajemen-user')->middleware('auth');
Route::get('/dashboard/manajemen-akun/register', [UserController::class, 'registerUser'])->name('auth.manajemen-user.register')->middleware('auth');
Route::get('/dashboard/manajemen-akun/detail/{user}', [UserController::class, 'detailUser'])->name('auth.manajemen-user.detail')->middleware('auth');
Route::get('/dashboard/manajemen-akun/edit/{user}', [UserController::class, 'editUser'])->name('auth.manajemen-user.edit')->middleware('auth');
Route::patch('/dashboard/manajemen-akun/update/{user}', [UserController::class, 'patch'])->name('auth.manajemen-user.patch')->middleware('auth');
Route::delete('/dashboard/manajemen-akun/delete/{user}', [UserController::class, 'deleteUser'])->name('auth.manajemen-user.delete')->middleware('auth');

//absensi
Route::get('/dashboard/absensi', [AbsensiController::class, 'index'])->name('auth.absensi.all')->middleware('auth');
Route::get('/dashboard/absensi/validasi', [AbsensiController::class, 'validasiSebelumAbsen'])->name('auth.absensi.validasi')->middleware('auth');
Route::get('/dashboard/absensi/tambah', [AbsensiController::class, 'create'])->name('auth.absensi.create')->middleware('auth');
Route::get('/dashboard/absensi/edit/{absen}', [AbsensiController::class, 'edit'])->name('auth.absensi.edit')->middleware('auth');
Route::patch('/dashboard/absensi/patch/{absen}', [AbsensiController::class, 'patch'])->name('auth.absensi.patch')->middleware('auth');
Route::delete('/dashboard/absensi/delete/{absen}', [AbsensiController::class, 'delete'])->name('auth.absensi.delete')->middleware('auth');
Route::post('/dashboard/absensi/simpan', [AbsensiController::class, 'store'])->name('auth.absensi.store')->middleware('auth');


// pembayaran spp
Route::get('/dashboard/pembayaran-spp', [PembayaranSppController::class, 'index'])->name('auth.pembayaran-spp.all')->middleware('auth');
// Route::get('/dashboard/pembayaran-')


//autenticate user
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('pages.dashboard')->middleware('auth');
