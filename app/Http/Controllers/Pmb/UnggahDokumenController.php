<?php

namespace App\Http\Controllers\Pmb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PmbSubmissionMail;

class UnggahDokumenController extends Controller
{
    public function index()
    {
        $registration = \App\Models\Registration::where('user_id', auth()->id())->first();

        // Cek jika belum menyelesaikan langkah 1 (Isi Formulir)
        if (!$registration || $registration->step < 2) {
            return redirect()->route('pmb.daftar')->with('error', 'Silakan selesaikan pengisian formulir terlebih dahulu.');
        }

        return view('pmb.unggah-dokumen', compact('registration'));
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
        $registration->update($updates);

        // Send Email Confirmation
        try {
            if ($registration->email) {
                Mail::to($registration->email)->send(new PmbSubmissionMail($registration));
            }
        } catch (\Exception $e) {
            // Log error or ignore to prevent blocking the user
            \Log::error('Gagal mengirim email konfirmasi pendaftaran PMB: ' . $e->getMessage());
        }

        // Send WhatsApp Confirmation via Fonnte
        try {
            if ($registration->no_hp) {
                $message = "Halo *{$registration->nama_lengkap}*, pendaftaran PMB STBA Pontianak berhasil diterima. Tim kami akan segera menghubungi Anda.\n\n"
                    . "Berikut adalah detail pendaftaran Anda:\n"
                    . "Nama Lengkap : {$registration->nama_lengkap}\n"
                    . "NIK : {$registration->nik}\n"
                    . "Program Studi : {$registration->program_studi}\n"
                    . "Sistem Kuliah : {$registration->sistem_kuliah}\n"
                    . "Asal Sekolah : {$registration->sekolah_asal}\n"
                    . "Email : {$registration->email}\n"
                    . "No. HP / WA : {$registration->no_hp}\n\n"
                    . "Terima kasih.";

                \Illuminate\Support\Facades\Http::timeout(5)->asForm()->withHeaders([
                    'Authorization' => config('services.fonnte.token')
                ])->post('https://api.fonnte.com/send', [
                    'target' => $registration->no_hp,
                    'message' => $message,
                    'countryCode' => '62',
                ]);
            }
        } catch (\Exception $e) {
            // Log error so it doesn't break the user experience
            \Log::error('Gagal mengirim WhatsApp konfirmasi pendaftaran PMB: ' . $e->getMessage());
        }

        return redirect()
            ->route('pmb.verifikasi-tes')
            ->with('success', 'Dokumen berhasil diunggah. Pendaftaran Anda sedang diverifikasi.');
    }
}
