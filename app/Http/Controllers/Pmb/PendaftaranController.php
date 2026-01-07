<?php

namespace App\Http\Controllers\Pmb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'nik'             => 'required|string|max:50',
            'tanggal_lahir'   => 'required|date',
            'jenis_kelamin'   => 'required|in:L,P',
            'email'           => 'required|email',
            'no_hp'           => 'required|string|max:20',
            'alamat'          => 'required|string',
            'program_studi'   => 'required|in:D3 Bahasa Inggris,S1 Sastra Inggris',
            'sistem_kuliah'   => 'required|in:Reguler (Pagi),Eksekutif (Malam)',
            'sekolah_asal'    => 'required|string|max:255',
            'jurusan_sekolah' => 'nullable|string|max:100',
            'tahun_lulus'     => 'required|string|max:4',
            'setuju'          => 'accepted',
        ]);

        // TODO: simpan ke tabel pendaftaran_pmb dan ambil ID-nya
        // $pendaftaran = PendaftaranPmb::create($data);

        // Redirect ke halaman proses administrasi (bisa kirim ID pendaftaran kalau perlu)
        return redirect()
            ->route('pmb.administrasi')
            ->with('success', 'Formulir pendaftaran berhasil disimpan. Silakan melanjutkan ke proses administrasi.');
    }
}
