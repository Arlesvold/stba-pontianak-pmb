<?php

namespace App\Http\Controllers\Pmb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    public function index()
    {
        return view('pmb.administrasi');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ijazah_rapor'     => 'required|file|mimes:jpg,jpeg,png,pdf|max:4096',
            'pas_foto'         => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        // TODO: simpan file, misalnya:
        // $bukti  = $request->file('bukti_pembayaran')->store('pmb/bukti');
        // $ijazah = $request->file('ijazah_rapor')->store('pmb/ijazah');
        // $foto   = $request->file('pas_foto')->store('pmb/foto');
        // lalu simpan path ke tabel administrasi_pmb

        return redirect()
            ->route('pmb.verifikasi-tes')
            ->with('success', 'Dokumen administrasi berhasil dikirim. Silakan lanjut ke tahap verifikasi dan tes.');
    }
}
