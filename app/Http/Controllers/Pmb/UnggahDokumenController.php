<?php

namespace App\Http\Controllers\Pmb;

use App\Http\Controllers\Controller;
use App\Mail\PmbSubmissionMail;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

        $request->validate([
            'ijazah_rapor' => $ijazahRule,
            'pas_foto'     => $fotoRule,
        ]);

        $updates = [];

        if ($request->hasFile('ijazah_rapor')) {
            $updates['ijazah_path'] = $request->file('ijazah_rapor')
                ->store('documents/ijazah', 'public');
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

        /**
         * WhatsApp Confirmation (Fonnte)
         */
        try {

            if ($registration->no_hp) {

                $message = "Halo *{$registration->nama_lengkap}*, pendaftaran PMB STBA Pontianak berhasil diterima.\n\n"
                    . "Detail Pendaftaran:\n"
                    . "Nama : {$registration->nama_lengkap}\n"
                    . "NIK : {$registration->nik}\n"
                    . "Program Studi : {$registration->program_studi}\n"
                    . "Sistem Kuliah : {$registration->sistem_kuliah}\n"
                    . "Sekolah Asal : {$registration->sekolah_asal}\n"
                    . "Email : {$registration->email}\n"
                    . "No HP : {$registration->no_hp}\n\n"
                    . "Terima kasih.";

                Http::timeout(5)
                    ->asForm()
                    ->withHeaders([
                        'Authorization' => config('services.fonnte.token')
                    ])
                    ->post('https://api.fonnte.com/send', [
                        'target' => $registration->no_hp,
                        'message' => $message,
                        'countryCode' => '62'
                    ]);
            }

        } catch (\Exception $e) {
            Log::error('WhatsApp PMB gagal: ' . $e->getMessage());
        }

        return redirect()
            ->route('pmb.verifikasi-tes')
            ->with('success', 'Dokumen berhasil diunggah. Pendaftaran sedang diverifikasi.');
    }
}
