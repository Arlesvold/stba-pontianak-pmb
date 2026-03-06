<?php

namespace App\Http\Controllers\Pmb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    /**
     * Menampilkan halaman formulir pendaftaran
     */
    public function index()
    {
        $registration = Registration::where('user_id', Auth::id())->first();

        return view('pmb.daftar', compact('registration'));
    }

    /**
     * Menyimpan data formulir pendaftaran
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'nik'             => 'required|string|max:50',
            'tanggal_lahir'   => 'required|date',
            'jenis_kelamin'   => 'required|in:L,P',
            'email'           => 'required|email|max:255',
            'no_hp'           => 'required|string|max:20',
            'alamat'          => 'required|string',
            'program_studi'   => 'required|in:D3 Bahasa Inggris,S1 Sastra Inggris',
            'sistem_kuliah'   => 'required|in:Reguler (Pagi),Eksekutif (Malam)',
            'sekolah_asal'    => 'required|string|max:255',
            'jurusan_sekolah' => 'nullable|string|max:100',
            'tahun_lulus'     => 'required|string|max:4',
            'setuju'          => 'accepted',
        ]);

        Registration::updateOrCreate(
            ['user_id' => Auth::id()],
            array_merge($data, [
                'step' => 2
            ])
        );

        return to_route('pmb.unggah-dokumen')
            ->with('success', 'Formulir pendaftaran berhasil disimpan.');
    }
}
