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
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'ijazah_rapor'     => 'required|file|mimes:jpg,jpeg,png,pdf|max:4096',
            'pas_foto'         => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        // TODO: simpan file, misalnya:
        // $bukti  = $request->file('bukti_pembayaran')->store('pmb/bukti');
        // $ijazah = $request->file('ijazah_rapor')->store('pmb/ijazah');
        // $foto   = $request->file('pas_foto')->store('pmb/foto');
        // lalu simpan path ke tabel administrasi_pmb

        return back()->with(
            'success',
            'Dokumen administrasi berhasil diunggah. Berkas Anda akan segera diverifikasi.'
        );
    }
}
