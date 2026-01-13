@extends('layouts.pmb')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-4">
            <h1 class="h4 mb-3">Langkah Berikutnya: Verifikasi & Tes</h1>
            <p class="text-muted mb-0">
                Dokumen administrasi Anda sudah terkirim. Silakan ikuti langkah verifikasi dan jadwal tes sesuai informasi
                berikut.
            </p>
        </div>
        @if (session('success'))
            <div class="alert alert-success text-center mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mx-auto" style="max-width: 720px;">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <ol class="mb-0">
                        <li>Menunggu verifikasi dokumen oleh panitia PMB.</li>
                        <li>Panitia akan menghubungi Anda melalui WhatsApp / email yang didaftarkan.</li>
                        <li>Ikuti tes sesuai jadwal yang dikirim oleh panitia.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
