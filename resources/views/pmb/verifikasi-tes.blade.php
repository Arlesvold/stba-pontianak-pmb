@extends('layouts.pmb-dashboard')

@section('title', 'Verifikasi & Tes - PMB STBA Pontianak')

@section('content')
    {{-- Main Content Header --}}
    <div class="mb-4">
        <h1 class="h3 fw-bold mb-2 text-dark">Verifikasi & Jadwal Tes</h1>
        <p class="text-muted">Dokumen administrasi Anda sudah terkirim. Silakan ikuti langkah verifikasi dan jadwal tes.</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                    <h5 class="card-title fw-bold text-dark mb-0">
                        <i class="bi bi-list-check me-2" style="color: var(--primary-maroon);"></i>
                        Langkah Selanjutnya
                    </h5>
                </div>
                <div class="card-body px-4 pb-4">
                    <ol class="mb-0">
                        <li class="mb-2">Menunggu verifikasi dokumen oleh panitia PMB.</li>
                        <li class="mb-2">Panitia akan menghubungi Anda melalui WhatsApp / email yang didaftarkan.</li>
                        <li>Ikuti tes sesuai jadwal yang dikirim oleh panitia.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Status Pendaftaran</h6>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        <span class="small">Formulir terisi</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        <span class="small">Dokumen terupload</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-hourglass-split text-warning me-2"></i>
                        <span class="small">Menunggu verifikasi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
