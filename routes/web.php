<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pmb.index');
})->name('beranda');

Route::get('/pmb/daftar', function () {
    return view('pmb.daftar');
})->name('pmb.daftar');

Route::get('/pmb/informasi', function () {
    return view('pmb.informasi');
})->name('pmb.informasi');
// Program Studi
Route::get('/program-studi/d3', function () {
    return view('prodi.d3');
})->name('prodi.d3');

Route::get('/program-studi/sarjana-satu', function () {
    return view('prodi.s1');
})->name('prodi.s1');

Route::get('/program-studi/sastra-inggris', function () {
    return view('prodi.sastra');
})->name('prodi.sastra');

// Berita
Route::get('/berita', function () {
    return view('berita.index');
})->name('berita.index');

// Agenda
Route::get('/agenda', function () {
    return view('agenda.index');
})->name('agenda.index');

// Kontak
Route::get('/kontak', function () {
    return view('kontak.index');
})->name('kontak');

// (route lain, misal berita, agenda, kontak, pmb.daftar, pmb.informasi, dll)
