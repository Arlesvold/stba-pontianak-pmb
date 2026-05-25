<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\Pmb\PendaftaranController;
use App\Http\Controllers\Pmb\UnggahDokumenController;
use App\Http\Controllers\ProfileController;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Event;
use App\Models\Setting;
use App\Models\Staf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    $heroSettings = cache()->remember('hero_settings', 3600, function () {
        $keys = ['hero_title', 'hero_subtitle', 'hero_badge_label', 'hero_tahun_akademik', 'hero_image', 'cta_title', 'cta_subtitle', 'cta_image'];
        return Setting::whereIn('key', $keys)->pluck('value', 'key')->toArray();
    });

    return view('pmb.index', compact('beritaTerbaru', 'agendas', 'stafs', 'events', 'heroSettings'));
})->name('beranda');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');


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

Route::get('/berita/{berita}', function (Berita $berita) {
    return view('berita.show', compact('berita'));
})->name('berita.show');

// Halaman daftar dokumen
Route::get('/dokumen', [\App\Http\Controllers\DokumenController::class, 'index'])->name('dokumen.index');

// Halaman staf / dosen
Route::get('/staf', function () {
    $stafs = \App\Models\Staf::where('status_aktif', true)
        ->orderBy('display_order')
        ->paginate(12);

    return view('staf.index', compact('stafs'));
})->name('staf.index');


// Halaman daftar agenda penting
Route::get('/agenda', function () {
    $agendas = Agenda::orderBy('tanggal_mulai', 'desc')->paginate(6);

    return view('agenda.index', compact('agendas'));
})->name('agenda.index');

// Halaman kontak PMB
Route::get('/kontak', function () {
    $kontaks = \App\Models\Kontak::where('aktif', true)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('kontak.index', compact('kontaks'));
})->name('kontak');

// Jika form kontak melakukan POST ke route('kontak'):
Route::post('/kontak', function (\Illuminate\Http\Request $request) {
    // sementara cukup redirect balik; nanti bisa diisi kirim email / simpan DB
    return back()->with('success', 'Pesan berhasil dikirim.');
})->name('kontak.kirim');

// Halaman unggah dokumen & verifikasi (auth required)
Route::middleware(['auth'])->group(function () {
    Route::get('/pmb/unggah-dokumen', [UnggahDokumenController::class, 'index'])
        ->name('pmb.unggah-dokumen');

    Route::post('/pmb/unggah-dokumen', [UnggahDokumenController::class, 'store'])
        ->name('pmb.unggah-dokumen.submit');

    Route::get('/pmb/verifikasi-tes', function () {
        $registration = \App\Models\Registration::where('user_id', Auth::id())->first();

        if (!$registration) {
            return redirect()->route('pmb.daftar');
        }

        if ($registration->step < 3) {
            return redirect()->route('pmb.unggah-dokumen')->with('error', 'Silakan selesaikan unggah dokumen terlebih dahulu.');
        }

        $waAdmin = cache()->remember('wa_admin', 3600, function () {
            return \App\Models\Setting::where('key', 'wa_admin')->value('value') ?? '';
        });

        return view('pmb.verifikasi-tes', compact('registration', 'waAdmin'));
    })->name('pmb.verifikasi-tes');
});





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
// ROUTE ADMIN (legacy — dinonaktifkan, semua dihandle Filament)
// ======================
