<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Pmb\PendaftaranController;
use App\Http\Controllers\Pmb\AdministrasiController;

use App\Models\Agenda;
use App\Models\Berita;

use Illuminate\Http\Request;

// ======================
// HALAMAN DEPAN (PMB)
// ======================

// Kalau beranda kamu ada di resources/views/pmb/index.blade.php
Route::get('/', function () {
    $beritaTerbaru = Berita::orderBy('tanggal', 'desc')
        ->limit(6)
        ->get();
    // 6 agenda penting terdekat
    $agendas = Agenda::orderBy('tanggal_mulai', 'asc')
        ->limit(6)
        ->get();

    return view('pmb.index', compact('beritaTerbaru', 'agendas'));
})->name('beranda');

// Halaman form pendaftaran PMB
Route::get('/pmb/daftar', function () {
    return view('pmb.daftar');
})->name('pmb.daftar');

Route::post('/pmb/daftar', [PendaftaranController::class, 'store'])
    ->name('pmb.daftar.submit');

// Halaman informasi PMB
Route::get('/pmb/informasi', function () {
    return view('pmb.informasi');
})->name('pmb.informasi');

// Halaman Program Studi Diploma (D3)
Route::get('/prodi/d3', function () {
    return view('prodi.d3');
})->name('prodi.d3');

// Halaman Program Studi Sarjana (S1)
Route::get('/prodi/s1', function () {
    return view('prodi.s1');
})->name('prodi.s1');

// Halaman Program Studi Sastra Bahasa Inggris (S1)
Route::get('/prodi/sastra', function () {
    return view('prodi.sastra');
})->name('prodi.sastra');

// Halaman daftar berita kampus
Route::get('/berita', function () {
    $beritas = Berita::orderBy('tanggal', 'desc')->paginate(6);

    return view('berita.index', compact('beritas'));
})->name('berita.index');

// Halaman daftar agenda penting
Route::get('/agenda', function () {
    $agendas = Agenda::orderBy('tanggal_mulai', 'asc')->get();

    return view('agenda.index', compact('agendas'));
})->name('agenda.index');

// Halaman kontak PMB
Route::get('/kontak', function () {
    return view('kontak.index');
})->name('kontak');

// Jika form kontak melakukan POST ke route('kontak'):
Route::post('/kontak', function (\Illuminate\Http\Request $request) {
    // sementara cukup redirect balik; nanti bisa diisi kirim email / simpan DB
    return back()->with('success', 'Pesan berhasil dikirim.');
})->name('kontak.kirim');

Route::get('/pmb/administrasi', function () {
    return view('pmb.administrasi');
})->name('pmb.administrasi');

Route::get('/pmb/administrasi', [AdministrasiController::class, 'index'])
    ->name('pmb.administrasi');

Route::post('/pmb/administrasi', [AdministrasiController::class, 'store'])
    ->name('pmb.administrasi.submit');




// ======================
// DASHBOARD BREEZE
// ======================

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// ======================
// PROFIL (BREEZE)
// ======================

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// ======================
// ROUTE ADMIN
// ======================

// redirect /admin ke dashboard
// Route::redirect('/admin', '/admin/dashboard');

// semua route admin wajib login
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Marquee
    Route::get('/marquee', [SettingController::class, 'editMarquee'])->name('marquee.edit');
    Route::post('/marquee', [SettingController::class, 'updateMarquee'])->name('marquee.update');

    // CRUD Berita
    Route::resource('berita', BeritaController::class);

    // CRUD Agenda
    Route::resource('agenda', \App\Http\Controllers\Admin\AgendaController::class);
});
