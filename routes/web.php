<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;    

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

// Relog
Route::get('/register', [UserController::class, 'showReg'])->middleware('guest')->name('user.register');
Route::post('/register', [UserController::class, 'register'])->name('user.submit');
Route::get('/login', [LoginController::class, 'showLogin'])->middleware('guest')->name('user.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Kelas
Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
Route::get('/kelas/{kelas}/pengaturan', [KelasController::class, 'showpengaturan'])->name('kelas.pengaturankelas');
Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');
Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
Route::post('/gabung-kelas', [KelasController::class, 'gabungKelas'])->name('gabung.kelas');
Route::get('/kelas/{kelas}', [KelasController::class, 'show'])->name('kelas.show');


// Tugas
Route::get('/kelas/{kelas}/tugas/create', [TugasController::class, 'create'])->name('tugas.create');
Route::post('/kelas/{kelas}/tugas/store', [TugasController::class, 'store'])->name('tugas.store');
Route::get('/kelas/{kelas}/{tugas}', [TugasController::class, 'show'])->name('tugas.show');


// User Interface
Route::get('/', [KelasController::class, 'index'])->middleware('auth')->name('home');
