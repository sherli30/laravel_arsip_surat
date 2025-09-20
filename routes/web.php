<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriSuratController;
use Illuminate\Support\Facades\Route;

// Redirect root ke arsip
Route::get('/', fn() => redirect()->route('arsip.index'));

// Halaman About
Route::view('/about', 'about')->name('about');

// Arsip Surat (resource + tambahan route download)
Route::resource('arsip', ArsipController::class);
Route::get('/arsip/{id}/download', [ArsipController::class, 'download'])->name('arsip.download');
Route::get('/arsip/{id}/lihat', [ArsipController::class, 'show'])->name('arsip.lihat');


// Kategori Surat (resource penuh, kecuali show)
Route::resource('kategori_surat', KategoriSuratController::class)->except(['show']);
