<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CategoryController;

Route::name('surat.')->group(function () {
    Route::get('/', [DocumentController::class, 'index'])->name('home'); // Tampilkan Halaman Utama
    Route::get('/surat/tambah', [DocumentController::class, 'create'])->name('tambah'); // Tampilkan Halaman Tambah Surat
    Route::get('/surat/detail/{id}', [DocumentController::class, 'show'])->name('detail'); // Tampilkan Halaman Detail Surat
    Route::post('/surat', [DocumentController::class, 'store'])->name('store'); // Simpan Surat
    Route::get('/surat/{id}/edit', [DocumentController::class, 'edit'])->name('edit'); // Tampilkan Halaman Edit Surat
    Route::put('/surat/{id}', [DocumentController::class, 'update'])->name('update'); // Simpan Surat yang Telah Diedit
    Route::delete('/surat/{id}', [DocumentController::class, 'destroy'])->name('destroy'); // Menghapus Surat
    Route::get('/surat/download/{id}', [DocumentController::class, 'download'])->name('download'); // Download Surat
    Route::get('/surat/search', [DocumentController::class, 'search'])->name('search');

});


Route::name('kategori.')->group(function (){
    Route::get('/kategori',[CategoryController::class,'index'])->name('home');
    Route::get('/kategori/tambah',[CategoryController::class,'create'])->name('tambah');
    Route::post('/kategori', [CategoryController::class, 'store'])->name('store');
    Route::get('/kategori/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/kategori/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/kategori/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    Route::get('/kategori/search', [CategoryController::class, 'search'])->name('search');
});

Route::get('/about', function() {
    return view('about');
});