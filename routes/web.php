<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Pmb\PendaftaranController;
use App\Http\Controllers\Pmb\UnggahDokumenController;
use App\Models\Staf;

use App\Models\Agenda;
use App\Models\Berita;


use Illuminate\Http\Request;

use App\Http\Controllers\EventController;
use App\Models\Event; // Import Event model

// ======================
// HALAMAN DEPAN (PMB)
// ======================

// Kalau beranda kamu ada di resources/views/pmb/index.blade.php

Route::get('/', function () {
    $beritaTerbaru = Berita::orderBy('tanggal', 'desc')
        ->limit(6)
        ->get();

    // Use Event model for the new section
    // Requirement: Show only events that have NOT ended yet
    $events = Event::where('tanggal_selesai', '>=', now()->startOfDay())
        ->orderBy('tanggal_mulai', 'asc')
        ->limit(4)
        ->get();

    // Removed fallback that showed old events, so expired events are hidden from homepage.

    $agendas = Agenda::orderBy('tanggal_mulai', 'asc')
        ->limit(6)
        ->get();

    $stafs = Staf::where('status_aktif', true)
        ->orderBy('display_order')
        ->limit(4)
        ->get();

    return view('pmb.index', compact('beritaTerbaru', 'agendas', 'stafs', 'events'));
})->name('beranda');

Route::get('/events', [EventController::class, 'index'])->name('events.index');


// Halaman form pendaftaran PMB (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/pmb/daftar', [PendaftaranController::class, 'index'])
        ->name('pmb.daftar');

    Route::post('/pmb/daftar', [PendaftaranController::class, 'store'])
        ->name('pmb.daftar.submit');
});

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
    $beritas = Berita::orderBy('tanggal', 'desc')->paginate(6); // 6 berita per halaman
    return view('berita.index', compact('beritas'));
})->name('berita.index');

// Halaman staf / dosen
Route::get('/staf', function () {
    $stafs = \App\Models\Staf::where('status_aktif', true)
        ->orderBy('display_order')
        ->get();

    return view('staf.index', compact('stafs'));
})->name('staf.index');


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

// Halaman unggah dokumen (GET)
Route::get('/pmb/unggah-dokumen', [UnggahDokumenController::class, 'index'])
    ->name('pmb.unggah-dokumen');

// Proses upload dokumen (POST)
Route::post('/pmb/unggah-dokumen', [UnggahDokumenController::class, 'store'])
    ->name('pmb.unggah-dokumen.submit');

// Halaman setelah kirim administrasi: Verifikasi & Tes
Route::get('/pmb/verifikasi-tes', function () {
    $registration = \App\Models\Registration::where('user_id', auth()->id())->first();

    if (!$registration) {
        return redirect()->route('pmb.daftar');
    }

    if ($registration->step < 3) {
        return redirect()->route('pmb.unggah-dokumen')->with('error', 'Silakan selesaikan unggah dokumen terlebih dahulu.');
    }

    return view('pmb.verifikasi-tes', compact('registration'));
})->name('pmb.verifikasi-tes');





// ======================
// DASHBOARD BREEZE REMOVED



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
    // Marquee
    Route::get('/marquee', [SettingController::class, 'editMarquee'])->name('marquee.edit');
    Route::post('/marquee', [SettingController::class, 'updateMarquee'])->name('marquee.update');

    // CRUD Berita
    Route::resource('berita', BeritaController::class);

    // CRUD Agenda
    Route::resource('agenda', \App\Http\Controllers\Admin\AgendaController::class);
});
