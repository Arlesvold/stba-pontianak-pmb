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
        $currentYear = (int) date('Y');

        $data = $request->validate([
            'nama_lengkap'    => ['required', 'string', 'max:255', 'regex:/^[\pL\s\'\-\.]+$/u'],
            'nik'             => ['required', 'digits:16'],
            'tanggal_lahir'   => ['required', 'date', 'before:today', 'after:1930-01-01'],
            'jenis_kelamin'   => ['required', 'in:L,P'],
            'email'           => ['required', 'email', 'max:255'],
            'no_hp'           => ['required', 'regex:/^(0[0-9]{8,12}|62[0-9]{8,12})$/'],
            'alamat'          => ['required', 'string', 'min:10', 'max:500'],
            'program_studi'   => ['required', 'in:D3 Bahasa Inggris,S1 Sastra Inggris'],
            'sistem_kuliah'   => ['required', 'in:Reguler (Pagi),Eksekutif (Malam)'],
            'sekolah_asal'    => ['required', 'string', 'max:255'],
            'jurusan_sekolah' => ['nullable', 'string', 'max:100'],
            'tahun_lulus'     => ['required', 'digits:4', 'integer', 'min:1950', 'max:' . $currentYear],
            'setuju'          => ['accepted'],
        ], [
            'nama_lengkap.required'  => 'Nama lengkap wajib diisi.',
            'nama_lengkap.regex'     => 'Nama lengkap hanya boleh berisi huruf, spasi, tanda hubung, dan titik.',
            'nik.required'           => 'NIK wajib diisi.',
            'nik.digits'             => 'NIK harus tepat 16 digit angka.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.before'   => 'Tanggal lahir tidak boleh hari ini atau di masa mendatang.',
            'tanggal_lahir.after'    => 'Tanggal lahir tidak valid.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Format email tidak valid.',
            'no_hp.required'         => 'Nomor HP wajib diisi.',
            'no_hp.regex'            => 'Nomor HP tidak valid. Awali dengan 08 atau 628, contoh: 08123456789.',
            'alamat.required'        => 'Alamat wajib diisi.',
            'alamat.min'             => 'Alamat terlalu singkat, minimal 10 karakter.',
            'program_studi.required' => 'Program studi wajib dipilih.',
            'sistem_kuliah.required' => 'Sistem kuliah wajib dipilih.',
            'sekolah_asal.required'  => 'Nama sekolah asal wajib diisi.',
            'tahun_lulus.required'   => 'Tahun lulus wajib diisi.',
            'tahun_lulus.digits'     => 'Tahun lulus harus tepat 4 digit angka.',
            'tahun_lulus.integer'    => 'Tahun lulus harus berupa angka.',
            'tahun_lulus.min'        => 'Tahun lulus tidak valid (minimal 1950).',
            'tahun_lulus.max'        => 'Tahun lulus tidak boleh melebihi tahun ini (' . $currentYear . ').',
            'setuju.accepted'        => 'Anda harus menyetujui pernyataan untuk melanjutkan.',
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
