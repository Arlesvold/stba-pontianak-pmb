<?php

namespace App\Http\Controllers\Pmb;

use App\Http\Controllers\Controller;
use App\Mail\PmbSubmissionMail;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UnggahDokumenController extends Controller
{
    public function index()
    {
        $registration = Registration::where('user_id', Auth::id())->first();

        if (!$registration || $registration->step < 2) {
            return redirect()
                ->route('pmb.daftar')
                ->with('error', 'Silakan selesaikan pengisian formulir terlebih dahulu.');
        }

        return view('pmb.unggah-dokumen', compact('registration'));
    }

    public function store(Request $request)
    {
        $registration = Registration::where('user_id', Auth::id())->firstOrFail();

        $ijazahRule = $registration->ijazah_path
            ? 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096'
            : 'required|file|mimes:jpg,jpeg,png,pdf|max:4096';

        $fotoRule = $registration->foto_path
            ? 'nullable|image|mimes:jpg,jpeg,png|max:1024'
            : 'required|image|mimes:jpg,jpeg,png|max:1024';

        $kkRule = $registration->kk_path
            ? 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096'
            : 'required|file|mimes:jpg,jpeg,png,pdf|max:4096';

        $transkripRule = $registration->transkrip_path
            ? 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096'
            : 'required|file|mimes:jpg,jpeg,png,pdf|max:4096';

        $request->validate([
            'ijazah_rapor' => $ijazahRule,
            'kk'           => $kkRule,
            'transkrip_nilai' => $transkripRule,
            'pas_foto'     => $fotoRule,
        ]);

        $updates = [];

        if ($request->hasFile('ijazah_rapor')) {
            $updates['ijazah_path'] = $request->file('ijazah_rapor')
                ->store('documents/ijazah', 'public');
        }

        if ($request->hasFile('kk')) {
            $updates['kk_path'] = $request->file('kk')
                ->store('documents/kk', 'public');
        }

        if ($request->hasFile('transkrip_nilai')) {
            $updates['transkrip_path'] = $request->file('transkrip_nilai')
                ->store('documents/transkrip', 'public');
        }

        if ($request->hasFile('pas_foto')) {
            $updates['foto_path'] = $request->file('pas_foto')
                ->store('documents/foto', 'public');
        }

        $updates['step'] = max(3, $registration->step);

        $registration->update($updates);

        /**
         * Email Confirmation
         */
        try {
            if ($registration->email) {
               Mail::to($registration->email)->queue(new PmbSubmissionMail($registration));
            }
        } catch (\Exception $e) {
            Log::error('Email PMB gagal: ' . $e->getMessage());
        }

        return redirect()
            ->route('pmb.verifikasi-tes')
            ->with('success', 'Dokumen berhasil diunggah. Pendaftaran sedang diverifikasi.');
    }
}
