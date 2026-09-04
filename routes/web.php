<?php

declare(strict_types=1);

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DampakController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\KemitraanController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ProgramController;
use App\Http\Controllers\Frontend\PublicationController;
use App\Http\Controllers\Frontend\ActivityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/struktur', [PageController::class, 'struktur'])->name('struktur');
Route::get('/aksi', [PageController::class, 'aksi'])->name('aksi');
Route::get('/aksi/{slug}', [PageController::class, 'aksiDetail'])->name('aksi.detail');
Route::get('/terkini', [ActivityController::class, 'index'])->name('terkini');
Route::get('/even', [PageController::class, 'even'])->name('even');

Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program/{program}', [ProgramController::class, 'show'])->name('program.show');

Route::get('/berita', [ActivityController::class, 'index'])->name('berita.index');
Route::get('/berita/{activity}', [ActivityController::class, 'show'])->name('berita.show');
Route::get('/galeri', [ActivityController::class, 'galeri'])->name('galeri');

Route::get('/dampak', [DampakController::class, 'index'])->name('dampak');
Route::get('/publikasi', [PublicationController::class, 'index'])->name('publikasi.index');

Route::get('/kemitraan', [KemitraanController::class, 'index'])->name('kemitraan');
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('kontak.store');
