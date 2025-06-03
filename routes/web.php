<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\peminjamanController;
use App\Mail\Notifikasiperpustakaan;
use Illuminate\Support\Facades\Mail;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/buku',[bukuController::class, 'index'])->name('buku');
Route::post('/buku', [bukuController::class, 'store'])->name('buku.store');
Route::put('/buku/{id_buku}', [bukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/{id_buku}', [bukuController::class, 'destroy'])->name('buku.destroy');

Route::get('/kategori',[kategoriController::class, 'index'])->name('kategori');
Route::post('/kategori', [kategoriController::class, 'store'])->name('kategori.store');
Route::put('/kategori/{id_kategori}', [kategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id_kategori}', [kategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/member',[memberController::class, 'index'])->name('member');
Route::post('/member', [memberController::class, 'store'])->name('member.store');
Route::put('/member/{id_member}', [memberController::class, 'update'])->name('member.update');
Route::delete('/member/{id_member}', [memberController::class, 'destroy'])->name('member.destroy');

Route::get('/peminjaman',[peminjamanController::class, 'index'])->name('peminjaman');
Route::post('/peminjaman', [peminjamanController::class, 'store'])->name('peminjaman.store');
Route::put('/peminjaman/{id_peminjaman}', [peminjamanController::class, 'update'])->name('peminjaman.update');
Route::delete('/peminjaman/{id_peminjaman}', [peminjamanController::class, 'destroy'])->name('peminjaman.destroy');

Route::get('send-test-email', function () {
    $details = 'Halo, ini pesan dari Laravel menggunakan Mailtrap.';
    Mail::to('mikeel@example.com')->send(new Notifikasiperpustakaan($details));

    return 'Email sudah dikirim!';
});