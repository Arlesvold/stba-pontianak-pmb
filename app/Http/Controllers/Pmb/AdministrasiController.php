<?php

namespace App\Http\Controllers\Pmb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    public function index()
    {
        $registration = \App\Models\Registration::where('user_id', auth()->id())->first();

        // Cek jika belum menyelesaikan langkah 1 (Isi Formulir)
        if (!$registration || $registration->step < 2) {
             return redirect()->route('pmb.daftar')->with('error', 'Silakan selesaikan pengisian formulir terlebih dahulu.');
        }

        return view('pmb.administrasi', compact('registration'));
    }

    public function store(Request $request)
    {
        $registration = \App\Models\Registration::where('user_id', auth()->id())->firstOrFail();

        // Validation rules
        // If file already exists in DB, the upload is optional (nullable). If not, it's required.
        $ijazahRule = $registration->ijazah_path ? 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096' : 'required|file|mimes:jpg,jpeg,png,pdf|max:4096';
        $fotoRule   = $registration->foto_path   ? 'nullable|image|mimes:jpg,jpeg,png|max:1024'    : 'required|image|mimes:jpg,jpeg,png|max:1024';

        $request->validate([
            'ijazah_rapor'     => $ijazahRule,
            'pas_foto'         => $fotoRule,
        ]);

        $updates = [];

        // Upload Logic
        if ($request->hasFile('ijazah_rapor')) {
            $updates['ijazah_path'] = $request->file('ijazah_rapor')->store('documents/ijazah', 'public');
        }

        if ($request->hasFile('pas_foto')) {
            $updates['foto_path'] = $request->file('pas_foto')->store('documents/foto', 'public');
        }

        // Move to step 3
        $updates['step'] = max(3, $registration->step);

        // Update DB
        if (!empty($updates)) {
             $registration->update($updates);
        }

        return redirect()
            ->route('pmb.verifikasi-tes')
            ->with('success', 'Dokumen administrasi berhasil dikirim. Silakan lanjut ke tahap verifikasi dan tes.');
    }
}
